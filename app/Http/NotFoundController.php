<?php

declare(strict_types=1);

namespace App\Http;

use Sahil\Http\Response;

/**
 * Renders the 404 page for the Vue starter-kit.
 */
final class NotFoundController
{
    public function response(): Response
    {
        return Response::html('<p>404 - Page not found</p>', 404);
    }
}