<?php
/**
 * Used when a markdown file cannot be found.
 *
 * @package       App.Error
 */
class MissingMarkdownException extends CakeException {

	protected $_messageTemplate = 'Markdown file %s is missing.';

}
?>