<?php

declare(strict_types=1);

namespace App\Http;

use Sahil\Http\Response;

/**
 * Renders the home page for the Vue starter-kit.
 */
final class HomeController
{
    public function response(): Response
    {
        return Response::html('<div id="app" data-mount-id="app" data-framework="vue"></div>'."\n".'<script type="application/json" id="app-props">{}</script>'."\n".'<noscript>This application requires JavaScript to run. Enable JavaScript and reload the page.</noscript>', 200);
    }
}