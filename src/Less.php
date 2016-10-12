<?php

namespace Cybtow\Utils;

/**
 * Less class
 *
 * @author cybtow
 */
class Less {

    /**
     *
     * @var \Less_Parser
     */
    private $parser;

    /**
     *
     * @var array
     */
    public $options = [
        'compress' => true,
        'relativeUrls' => false    // bug? if this is false, then the urls are relatives 
    ];

    /**
     *
     * @var array
     */
    public $variables = [
    ];

    /**
     * Constructor
     */
    public function __construct() {
        $this->parser = new \Less_Parser();
    }

    /**
     * parseFile
     * 
     * @param string $inFileLess
     * @param string $pathCssBase
     * @param array $pathsIncludes
     * @param string $outFileCss
     */
    public function parseFile($inFileLess, $pathCssBase, $pathsIncludes, $outFileCss) {

        // create directories
        if (!is_dir(dirname($outFileCss))) {
            FileSystem::mkdir(dirname($outFileCss));
        }
        if ((isset($this->options['cache_dir'])) && (!is_dir($this->options['cache_dir']))) {
            FileSystem::mkdir($this->options['cache_dir']);
        }

        $this->parser->Reset();
        $this->parser->SetOptions($this->options);
        $this->parser->ModifyVars($this->variables);
        $this->parser->SetImportDirs($pathsIncludes);
        $this->parser->parseFile($inFileLess, $pathCssBase);
        file_put_contents($outFileCss, $this->parser->getCss());
    }

}
