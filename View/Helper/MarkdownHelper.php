<?php
use Michelf\Markdown;

/**
 * Markdown Helper
 *
 * @package app.View.Helper
 */
class MarkdownHelper extends AppHelper {

/**
 * Convert markdown to html
 *
 * @param  string $text Text in markdown format
 * @return string
 */
	public function transform($text) {
		if (!isset($this->parser)) {
			if (!class_exists('Markdown')) {
				App::import('Vendor', 'Markdown.MarkdownExtra' . DS . 'Michelf' . DS . 'Markdown');
			}
			$this->parser = new Markdown();
		}
		return $this->parser->transform($text);
	}

}
?>