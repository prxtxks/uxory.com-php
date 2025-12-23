<?php
foreach (glob("*.php") as $file) {

    $content = file_get_contents($file);

    // Must contain doctype and <html
    if (
        stripos($content, '<!DOCTYPE html') === false ||
        stripos($content, '<html') === false
    ) {
        continue;
    }

    // Skip if already dark
    if (preg_match('/<html[^>]*class=["\'][^"\']*dark[^"\']*["\']/', $content)) {
        echo "✔ Skipping (already dark): $file\n";
        continue;
    }

    // Replace first <html ...>
    $updated = preg_replace(
        '/<html([^>]*)>/i',
        '<html$1 class="dark">',
        $content,
        1
    );

    if ($updated !== $content) {
        file_put_contents($file, $updated);
        echo "✅ Updated: $file\n";
    }
}