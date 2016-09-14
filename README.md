# QuoteGeneratorBundle

## Installation

### Step 1. Install

Open a command console, enter your project directory and execute the following command to download the latest stable version:
```bash
$ composer require nathiss/quote-generator-bundle
```

### Step 2. Enable bundle

Enable the bundle by adding it to the list of registred bundles in the `app/AppKernel.php` file:
```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Nathiss\Bundle\QuoteGeneratorBundle\NathissQuoteGeneratorBundle(),
            // ...
        );
        // ...
    }
    // ...
}
```

### Step 3. Update database schema
To update schema enter this command:
```bash
$ ./bin/console doctrine:schema:update --force
```

### Step 4. Configuration (optional)
You can override the default template by adding these lines to your `app/config/config.yml` file:
```yaml
nathiss_quote_generate:
    template: 'path/to/your/template.html.twig'
```
Default: `NathissQuoteGeneratorBundle:Default:quote.html.twig`

### Step 5. Load fixtures (optional)
To load fixtures enter this command:
```bash
$ ./bin/console doctrine:fixtures:load
```
(TIP: add `--append` options if you wish not to delete data in your database)

## Usage

Execute `generate_quote()` function inside your twig template:
```twig
{# ... #}
{{ generate_quote() }}
{# ... #}
```

will render as:
```twig
{# ... #}
<blockquote class="nathiss-quote">
    <p>Some quote</p>
    <span class="nathiss-quote-author">Some author</span>
</blockquote>
{# ... #}
```

## License
See the [license](https://github.com/nathiss/quote-generator-bundle/blob/master/LICENSE) file.
