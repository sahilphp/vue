# SahilPHP Vue UI kit

Vue 3 + Vite frontend for SahilPHP applications.

## Requirements

- PHP 8.2+
- Composer 2
- Node.js 20.19+
- npm 10+

## Installation

> [!WARNING]
> This package is a **library**, not a project skeleton.
> `composer create-project sahilphp/vue` fails by design.
> Create a project with `sahilphp new my-app` and choose **Vue** during setup;
> the installer wires Vue, Vite and your CSS framework together.
>
> Install it as a dependency with:
>
> ```bash
> composer require sahilphp/vue
> ```

Create a new application with the installer:

```bash
sahilphp new my-app --ui-kit=vue --css=tailwind
cd my-app
npm install
```

## Development

```bash
npm run dev          # Vite on http://127.0.0.1:5173
php sahil start      # PHP on http://127.0.0.1:8000
```
