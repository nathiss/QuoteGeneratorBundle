<?php

/**
 * This is a part of NathissQuoteGeneratorBundle.
 *
 * NathissQuoteGeneratorBundle is Symfony 2|3 bundle for generating quotes, which are randomly selected from database.
 * For the full copyright and license information, please view the LICENSE file that was distributed with the source code.
 *
 * @package nathiss/quote-generator-bundle
 * @author Kamil Rusin <kamil.jakub.rusin@gmail.com>
 */

namespace Nathiss\Bundle\QuoteGeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Bundle for generating quotes.
 *
 * Selects quote from database and renders it as html.
 */
class NathissQuoteGeneratorBundle extends Bundle
{
}
