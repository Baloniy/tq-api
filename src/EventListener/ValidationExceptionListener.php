<?php

declare(strict_types=1);

namespace App\EventListener;

use Throwable;
use App\Exception\ValidationException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

#[AsEventListener]
readonly class ValidationExceptionListener
{
    public function __construct(
        private SerializerInterface $serializer
    ) {
    }

    public function __invoke(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();

        if (!$throwable instanceof ValidationException) {
            return;
        }

        $data = $this->serializer->serialize(
            data: $this->createErrorResponseInstance($throwable),
            format: JsonEncoder::FORMAT
        );

        $event->setResponse(new JsonResponse(data: $data, status: Response::HTTP_BAD_REQUEST, json: true));
    }

    private function createErrorResponseInstance(Throwable $throwable): object
    {
        return new class ($throwable->getMessage(), ['violations' => $throwable->getViolationList()]) {
            public function __construct(
                private readonly string $message,
                private readonly mixed $details = null
            ) {
            }

            public function getMessage(): string
            {
                return $this->message;
            }

            public function getDetails(): mixed
            {
                return $this->details;
            }
        };
    }
}
