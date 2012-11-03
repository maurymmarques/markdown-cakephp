<?php
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
			if (!class_exists('Markdown_Parser')) {
				App::import('Vendor', 'Markdown.MarkdownExtra/markdown');
			}
			$this->parser = new Markdown_Parser();
		}
		return $this->parser->transform($text);
	}

}
?>