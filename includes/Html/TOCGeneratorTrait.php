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
	 * Add a section to the table of contents. This doesn't add the heading to the actual page.
	 * Assumes the IDs don't use non-ASCII characters.
	 *
	 * @param string $labelMsg Message key to use for the label
	 * @param string $id
	 */
	protected function addTocSection( string $labelMsg, string $id ): void {
		$this->tocIndex++;
		$this->tocSection++;
		$this->tocData->addSection( new SectionMetadata(
			1,
			2,
			$this->msg( $labelMsg )->escaped(),
			$this->getLanguage()->formatNum( $this->tocSection ),
			(string)$this->tocIndex,
			null,
			null,
			$id,
			$id
		) );
	}
}
