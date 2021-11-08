<?php

function getFormattedSize($size)
{
	$formattedSize = $size < 10 ** 6 ? sprintf("%g kB", ($size / (10 ** 3))) : sprintf("%g MB", ($size / (10 ** 6)));

	return $formattedSize;
}
