<?php

namespace views;

abstract class View
{
  const DEFAULT_HEADER = 'header.php';
  const DEFAULT_FOOTER = 'footer.php';

  const FLAG_NO_HEADER_FOOTER = 'no_header_footer';

  public static function render($body, $header = null, $footer = null)
  {
    if ($header == null)
      include('views/includes/components/' . self::DEFAULT_HEADER);
    else if ($header != self::FLAG_NO_HEADER_FOOTER)
      include('views/includes/components/' . $header);

    include('views/includes/pages/' . $body);

    if ($footer == null)
      include('views/includes/components/' . self::DEFAULT_FOOTER);
    else if ($footer != self::FLAG_NO_HEADER_FOOTER)
      include('views/includes/components/' . $footer);
  }
}
