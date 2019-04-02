<?php

namespace Bgaze\IpsumHtml\Nodes;

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
     * @param mixed $content        The node content : node, string, or an array of strings/nodes
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
     * @param mixed $content        The node content : node, string, or an array of strings/nodes
     * 
     * @return $this
     */
    public function setContent($content) {
        $this->content = '';
        return $this->append($content);
    }

    /**
     * Append content to the node
     * 
     * @param mixed $content        The node content : node, string, or an array of strings/nodes
     * 
     * @return $this
     */
    public function append($content) {
        if (is_array($content)) {
            foreach ($content as $c) {
                $this->append($c);
            }
            return $this;
        }

        $this->content .= is_a($content, PlainText::class) ? $content->minify() : $content;

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
     * @param integer $offset   The number of indentations of the node
     * @param integer $size     The number of space in an indentation level
     * @param integer $wrap     Wrap text lines to not exceed specified length (indentation excluded) 
     * 
     * @return string
     */
    public function prettify($offset = 0, $size = 4, $wrap = 100) {
        $indent = str_repeat(' ', $offset * $size);
        $wrapped = wordwrap($this->minify(), $wrap, "\n");
        return $indent . str_replace("\n", "\n" . $indent, $wrapped);
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
