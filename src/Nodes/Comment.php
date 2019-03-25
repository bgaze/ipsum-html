<?php

namespace Bgaze\IpsumHtml\Nodes;

use Bgaze\IpsumHtml\Nodes\PlainText;

/**
 * A HTML comment node.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class Comment extends PlainText {

    /**
     * Is the node an inlined element (printed on one line)
     * 
     * @var boolean 
     */
    protected $inline;

    /**
     * The class constructor.
     * 
     * @param mixed $content        The node content
     */
    public function __construct($content = null) {
        $this->content = [];
        $this->inline = true;

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
        return $this->inline;
    }

    /**
     * Define if the node is an inline element
     * 
     * @param boolean $inline
     */
    public function setInline(bool $inline) {
        $this->inline = $inline;
        return $this;
    }

    /**
     * Get the node content
     * 
     * @return array
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set the node content
     * 
     * @param array $content
     * 
     * @return $this
     */
    public function setContent($content) {
        $this->content = [];
        return $this->append($content);
    }

    /**
     * Append content to the node
     * 
     * @param mixed $content
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

        $this->content[] = is_a($content, PlainText::class) ? $content : new PlainText($content);

        return $this;
    }

    /**
     * Compile the node content to a minified string
     * 
     * @return string
     */
    public function minifyContent() {
        $html = '';

        foreach ($this->content as $node) {
            $html .= $node->minify();
        }

        return $html;
    }

    /**
     * Compile node to a minified string
     * 
     * @return string
     */
    public function minify() {
        return sprintf('<!-- %s -->', $this->minifyContent());
    }

    /**
     * Compile the node content to a prettified string
     * 
     * @param type $offset
     * @param type $size
     * @param type $wrap
     * 
     * @return string
     */
    public function prettifyContent($offset = 0, $size = 4, $wrap = 100) {
        $html = [];

        foreach ($this->content as $c) {
            $html[] = $c->prettify($offset, $size, $wrap);
        }

        return rtrim(implode("\n", $html));
    }

    /**
     * Compile node to a prettified string
     * 
     * @param type $offset
     * @param type $size
     * @param type $wrap
     * 
     * @return string
     */
    public function prettify($offset = 0, $size = 4, $wrap = 100) {
        if ($this->isInline()) {
            return $this->minify();
        }

        $indent = str_repeat(' ', $offset * $size);
        $content = $this->prettifyContent($offset + 1, $size, $wrap);
        return sprintf("%s<!--\n%s\n%s-->", $indent, $content, $indent);
    }

}
