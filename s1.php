<?php

use Drupal\block_content\Entity\BlockContent;
use Drupal\default_content\DefaultContentExporter;

// Bootstrap Drupal.
require_once 'web/core/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// Load all custom blocks.
$storage = \Drupal::entityTypeManager()->getStorage('block_content');
$blocks = $storage->loadMultiple();

$exporter = \Drupal::service('default_content.exporter');
$exported = 0;

foreach ($blocks as $block) {
  try {
    $exporter->exportContent($block, 'default_content/block_content');
    echo "✅ Exported block: " . $block->label() . "\n";
    $exported++;
  } catch (\Exception $e) {
    echo "⚠️ Skipped block: " . $block->id() . " – " . $e->getMessage() . "\n";
  }
}

echo "✅ Finished exporting $exported blocks.\n";
