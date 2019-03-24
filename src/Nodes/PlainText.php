<?php

namespace Bgaze\HtmlFaker\Nodes;

/**
 * A plain text node.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class PlainText {

    /**
     * The node content
     * 
     * @var string 
     */
    protected $content;

    /**
     * The class constructor.
     * 
     * @param string $content        The node content
     */
    public function __construct($content = null) {
        $this->content = '';

        if ($content) {
            $this->append($content);
        }
    }

    /**
     * Is the node an inline element
     * 
     * @return boolean
     */
    public function isInline() {
        return true;
    }

    /**
     * Get the node content
     * 
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set the node content
     * 
     * @param string $content
     * 
     * @return $this
     */
    public function setContent($content) {
        $this->content = "$content";
        return $this;
    }

    /**
     * Append content to the node
     * 
     * @param string $content
     * 
     * @return $this
     */
    public function append($content) {
        $this->content .= $content;
        return $this;
    }

    /**
     * Compile node to a minified string
     * 
     * @return string
     */
    public function minify() {
        return trim(preg_replace('/ +/', ' ', $this->content));
    }

    /**
     * Compile node to a prettified string
     * 
     * @return string
     */
    public function prettify($offset = 0, $size = 4, $wrap = 100) {
        $indent = str_repeat(' ', $offset * $size);
        return $indent . wordwrap($this->minify(), $wrap, "\n" . $indent);
    }

    /**
     * Compile node to a prettified string
     * 
     * @return string
     */
    public function __toString() {
        return $this->prettify();
    }

}
