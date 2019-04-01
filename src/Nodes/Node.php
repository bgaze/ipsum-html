<?php

namespace Bgaze\IpsumHtml\Nodes;

use Bgaze\IpsumHtml\Nodes\Comment;

/**
 * A HTML node.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class Node extends Comment {

    /**
     * The list of HTML void elements (self closing tags)
     */
    public const VOID_ELEMENTS = [
        'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link',
        'meta', 'param', 'source', 'track', 'wbr'
    ];

    /**
     * The list of HTML void elements (self closing tags)
     */
    public const INLINE_ELEMENTS = [
        'a', 'abbr', 'acronym', 'b', 'bdi', 'bdo', 'button', 'caption', 'cite',
        'code', 'data', 'dd', 'del', 'dfn', 'dt', 'em', 'figcaption', 'h1',
        'h2', 'h3', 'h4', 'h5', 'h6', 'i', 'kbd', 'label', 'legend', 'li',
        'mark', 'option', 'pre', 'q', 'rp', 'rt', 's', 'samp', 'small', 'span',
        'strong', 'sub', 'sup', 'td', 'th', 'time', 'title', 'u', 'var'
    ];

    /**
     * The node tag
     * 
     * @var string 
     */
    protected $tag;

    /**
     * The node attributes
     * 
     * @var array 
     */
    protected $attributes;

    /**
     * Is the node a void element (self closing tag)
     * 
     * @var boolean 
     */
    protected $void;

    /**
     * The class constructor.
     * 
     * @param string $tag           The node tag
     * @param mixed $content        The node content
     */
    public function __construct($tag, $content = null) {
        $this->void = in_array($tag, self::VOID_ELEMENTS);
        $this->inline = in_array($tag, self::INLINE_ELEMENTS);
        $this->content = [];
        $this->attributes = [];

        $this->setTag($tag);
        if ($content) {
            $this->append($content);
        }
    }

    /**
     * Is the node a void element (self closing tag)
     * 
     * @return boolean
     */
    public function isVoid() {
        return $this->void;
    }

    /**
     * Get the node tag
     * 
     * @return string
     */
    public function getTag() {
        return $this->tag;
    }

    /**
     * Set the node tag
     * 
     * @param string $tag
     * 
     * @return $this
     * @throws \Exception
     */
    public function setTag($tag) {
        if (!preg_match('/^[a-zA-Z]([a-zA-Z0-9])*$/', $tag)) {
            throw new \Exception("{$name} is not a valid tag.");
        }

        $this->tag = strtolower($tag);
        return $this;
    }

    /**
     * Get the node attributes
     * 
     * @return array
     */
    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * Set the node attributes
     * 
     * @param array $attributes
     * 
     * @return $this
     */
    public function setAttributes(array $attributes) {
        $this->attributes = [];

        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * Set an attribute value
     * 
     * @param string $key
     * @param string $value
     * 
     * @return $this
     */
    public function setAttribute($key, $value) {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * Get an attribute value
     * 
     * @param string $key
     * @return string|null
     */
    public function getAttribute($key) {
        if (!isset($this->attributes[$key])) {
            return null;
        }
        return $this->attributes[$key];
    }

    /**
     * Append child or children to the node
     * 
     * @param mixed $content
     * 
     * @return $this
     */
    public function append($content) {
        if (!$this->void) {
            return parent::append($content);
        }

        return $this;
    }

    /**
     * Compile node attributes to a string.
     */
    protected function compileAttributes() {
        $attributes = '';

        foreach ($this->attributes as $k => $v) {
            $attributes .= ' ' . $k . '="' . str_replace('"', '\\"', $v) . '"';
        }

        return $attributes;
    }

    /**
     * Compile node to a minified string
     * 
     * @return string
     */
    public function minify() {
        $attributes = $this->compileAttributes();

        if ($this->void) {
            return sprintf('<%s%s/>', $this->tag, $attributes);
        }

        $doctype = ($this->tag === 'html') ? "<!DOCTYPE html>\n" : "";

        return sprintf('%s<%s%s>%s</%s>', $doctype, $this->tag, $attributes, $this->minifyContent(), $this->tag);
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

        if ($this->void || $this->inline) {
            return $indent . $this->minify();
        }

        $doctype = ($this->tag === 'html') ? "{$indent}<!DOCTYPE html>\n" : "";

        $html = sprintf("%s%s<%s%s>\n", $doctype, $indent, $this->tag, $this->compileAttributes());
        $html .= $this->prettifyContent($offset + 1, $size, $wrap);
        $html .= sprintf("\n%s</%s>", $indent, $this->tag);

        return rtrim($html);
    }

}
