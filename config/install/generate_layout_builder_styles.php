<?php

// Define the base settings for the YAML content
$baseContent = "langcode: en\nstatus: true\ndependencies: {  }\nid: %s\nlabel: %s\nclasses: %s\ntype: %s\ngroup: %s\nblock_restrictions: {  }\nlayout_restrictions: {  }\nweight: 0\n";

// Define the increments and the variants
$increments = [0, 2, 4, 8, 16, 32, 64];
$variants = ['md', 'lg'];

foreach ($increments as $increment) {
    // Generate non-variant and variant files
    foreach ($variants as $variant) {
        // Section files
        $sectionId = "section_p_${increment}_{$variant}";
        $sectionFileName = "layout_builder_styles.style.$sectionId.yml";
        $sectionLabel = "p-$increment $variant";
        $sectionClasses = "{$variant}:p-$increment";
        $sectionGroup = "section_$variant";
        file_put_contents($sectionFileName, sprintf($baseContent, $sectionId, $sectionLabel, $sectionClasses, "section", $sectionGroup));

        // Block files
        $blockId = "block_p_${increment}_{$variant}";
        $blockFileName = "layout_builder_styles.style.$blockId.yml";
        $blockLabel = "p-$increment $variant";
        $blockClasses = "{$variant}:p-$increment";
        $blockGroup = "block_$variant";
        file_put_contents($blockFileName, sprintf($baseContent, $blockId, $blockLabel, $blockClasses, "component", $blockGroup));
    }

    // Non-variant files (to be included in the loop or separately as needed)
    $sectionId = "section_p_${increment}";
    $sectionFileName = "layout_builder_styles.style.$sectionId.yml";
    $sectionLabel = "p-$increment";
    $sectionClasses = "p-$increment";
    $sectionGroup = "section";
    file_put_contents($sectionFileName, sprintf($baseContent, $sectionId, $sectionLabel, $sectionClasses, "section", $sectionGroup));

    $blockId = "block_p_${increment}";
    $blockFileName = "layout_builder_styles.style.$blockId.yml";
    $blockLabel = "p-$increment";
    $blockClasses = "p-$increment";
    $blockGroup = "block";
    file_put_contents($blockFileName, sprintf($baseContent, $blockId, $blockLabel, $blockClasses, "component", $blockGroup));
}

echo "All files generated successfully with matching IDs and filenames.\n";
?>
