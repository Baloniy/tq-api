<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Dto\ErrorDebugDetails;
use App\Dto\ErrorResponse;
use App\Service\ExceptionHandler\ExceptionMapping;
use App\Service\ExceptionHandler\ExceptionMappingResolver;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

#[AsEventListener]
readonly class ApiExceptionListener
{
    public function __construct(
        private ExceptionMappingResolver $resolver,
        private LoggerInterface $logger,
        private SerializerInterface $serializer,
        private bool $isDebug
    ) {
    }

    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $mapping = $this->resolver->resolve(get_class($exception));

        if ($mapping === null) {
            $mapping = ExceptionMapping::fromCode(code: Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($mapping->getCode() >= Response::HTTP_INTERNAL_SERVER_ERROR || $mapping->isLoggable()) {
            $this->logger->error($exception->getMessage(), [
                'trace' => $exception->getTraceAsString(),
                'previous' => $exception->getPrevious() !== null ? $exception->getPrevious()->getMessage() : '',
            ]);
        }

        $details = $this->isDebug ? new ErrorDebugDetails($exception->getTraceAsString()) : null;

        $data = $this->serializer->serialize(new ErrorResponse($exception->getMessage(), $details), JsonEncoder::FORMAT);

        $response = new JsonResponse(data: $data, status: $mapping->getCode(), json: true);

        $event->setResponse($response);
    }
}
