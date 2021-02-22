<?php

namespace views;

abstract class View
{
	const DEFAULT_HEADER = 'header.php';
	const DEFAULT_FOOTER = 'footer.php';

	public function render($body, $header = null, $footer = null)
	{
		if ($header == null)
			include('views/includes/components/'.self::DEFAULT_HEADER);
		else
			include('views/includes/components/'.$header);

		include('views/includes/pages/'.$body);

		if ($footer == null)
			include('views/includes/components/'.self::DEFAULT_FOOTER);
		else
			include('views/includes/components/'.$footer);
	}
}
