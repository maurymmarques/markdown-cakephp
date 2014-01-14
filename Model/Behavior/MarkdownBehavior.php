<?php
use Michelf\Markdown;

class MarkdownBehavior extends ModelBehavior {

/**
 * Convert markdown to html
 *
 * @param  string $text Text in markdown format
 * @return string
 */
	public function transform(Model $Model, $text)
	{
		if (!isset($Model->parser)) {
			if (!class_exists('Markdown')) {
				App::import('Vendor', 'Markdown.MarkdownExtra' . DS . 'Michelf' . DS . 'Markdown');
			}
			$Model->parser = new Markdown();
		}
		return $Model->parser->transform($text);
	}
}