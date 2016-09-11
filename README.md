# QuoteGeneratorBundle

## Installation

### Step 1.

Open a command console, enter your project directory and execute the following command to download the latest stable version:
```bash
$ composer require nathiss/quote-generator-bundle
```

### Step 2.

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
