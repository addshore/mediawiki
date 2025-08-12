<?php

namespace MediaWiki\Html;

use Wikimedia\Parsoid\Core\SectionMetadata;

/**
 * Trait for classes that generate a Table of Contents.
 *
 * @since 1.45
 */
trait TOCGeneratorTrait {
	/**
	 * Creates a TOC section metadata object.
	 *
	 * @param string $label The label for the TOC entry.
	 * @param string $number The section number.
	 * @param string $index The section index.
	 * @param string $id The HTML ID of the section header.
	 * @param int $level The heading level (e.g., 2 for h2).
	 * @param bool $isMsgKey Whether the label is an i18n message key.
	 * @return SectionMetadata
	 */
	protected function createTocSection(
		string $label,
		string $number,
		string $index,
		string $id,
		int $level = 2,
		bool $isMsgKey = true
	): SectionMetadata {
		return new SectionMetadata(
			1, // toclevel
			$level,
			$isMsgKey ? $this->msg( $label )->escaped() : htmlspecialchars( $label ),
			$number,
			$index,
			null,
			null,
			$id,
			$id
		);
	}
}
