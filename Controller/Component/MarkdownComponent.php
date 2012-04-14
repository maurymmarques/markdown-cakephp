<?php
App::uses('Component', 'Controller');

/**
 * MarkdownComponent
 *
 * @package		app.Controller.Component
 */
class MarkdownComponent extends Component {

/**
 * Reads entire file into a string.
 *
 * @param $file Path to the file
 * @return read data or FALSE on failure
 */
	public function getFile($file) {
		if (!file_exists($file)) {
			throw new MissingMarkdownException(array('file' => $file));
		}

		return file_get_contents($file);
	}

}
?>