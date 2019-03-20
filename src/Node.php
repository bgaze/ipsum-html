<?php

namespace Bgaze\HtmlFaker;

/**
 * An HTML node.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class Node {

    /**
     * The list of HTML void elements (self closing tags)
     */
    const VOID_ELEMENTS = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'];

    /**
     * The list of HTML void elements (self closing tags)
     */
    const INLINE_ELEMENTS = [
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'span', 'button', 'label', 'legend', 'option',
        'textarea', 'abbr', 'acronym', 'code', 'cite',
        'del', 'em', 'b', 'i', 'a', 'u', 'kbd', 'mark', 'q', 'small',
        'strong', 'sub', 'sup', 'tt', 'var', 'dd', 'dt', 'li',
        'th', 'td', 'script', 'title', 'pre'
    ];

    /**
     * Do not add blank line after these elements during prettify
     */
    const NO_SPACE_AFTER = ['li', 'th', 'td', 'dt'];

    ### PROPERTIES ###

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
     * The node content
     * 
     * @var array 
     */
    protected $content;

    /**
     * Is the node a void element (self closing tag)
     * 
     * @var boolean 
     */
    protected $void;

    /**
     * Is the node an inlined element (printed on one line)
     * 
     * @var boolean 
     */
    protected $inline;

    /**
     * Is the node a HTML comment
     * 
     * @var boolean 
     */
    protected $comment;

    ### INSTANCIATION ###

    /**
     * The class constructor.
     * 
     * @param string $tag           The node tag
     * @param mixed $content        The node content
     */
    public function __construct($tag, $content = null) {
        $this->void = in_array($tag, self::VOID_ELEMENTS);
        $this->inline = in_array($tag, self::INLINE_ELEMENTS);
        $this->comment = ($tag === '!--');
        $this->tag = $tag;
        $this->content = [];
        $this->attributes = [];

        if ($content) {
            $this->append($content);
        }
    }

    /**
     * Generate node using a static method to ease fluent style.
     * 
     * @param string $tag           The node tag
     * @param mixed $content        The node content
     * 
     * @return \Bgaze\HtmlFaker\Node
     */
    public static function make($tag, $content = null) {
        return new Node($tag, $content);
    }

    ### MISC GETTERS & SETTERS ###

    /**
     * Is the node a void element (self closing tag)
     * 
     * @return boolean
     */
    public function isVoid() {
        return $this->void;
    }

    /**
     * Is the node a HTML comment
     * 
     * @return boolean
     */
    public function isComment() {
        return $this->comment;
    }

    /**
     * Is the node an inline element
     * 
     * @return type
     */
    public function isInline() {
        return $this->inline;
    }

    /**
     * Define if the node is an inline element
     * 
     * @param bool $inline
     */
    public function setInline(bool $inline) {
        $this->inline = $inline;
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
     */
    public function setTag($tag) {
        $this->tag = $tag;
        return $this;
    }

    ### ATTRIBUTES MANAGEMENT ###

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
        return $this->addAttributes($attributes);
    }

    /**
     * Set an attribute value
     * 
     * The $key argument can be an associative array of attributes.
     * 
     * @param mixed $key
     * @param string $value
     * 
     * @return $this
     * @throws \Exception
     */
    public function setAttribute($key, $value) {
        if ($this->comment) {
            throw new \Exception("Comments cannot have attributes.");
        }

        $this->attributes[$key] = $value;
        return $this;
    }

    ### CONTENT MANAGEMENT ###

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
    public function setContent(array $content) {
        $this->content = [];
        $this->append($content);
        return $this;
    }

    /**
     * Append child or children to the node
     * 
     * @param mixed $content
     * 
     * @return $this
     * @throws \Exception
     */
    public function append($content) {
        if ($this->void) {
            throw new \Exception("Void elements cannot have children ({$this->tag}).");
        }

        if (is_array($content)) {
            foreach ($content as $c) {
                $this->append($c);
            }
            return $this;
        }

        $this->content[] = $content;
        return $this;
    }

    /**
     * Append current node to a node
     * 
     * @param \Bgaze\HtmlFaker\Node $node
     * 
     * @return $this
     */
    public function appendTo(Node $node) {
        $node->append($node);

        return $this;
    }

    ### DISPLAY ###

    /**
     * Compile node opening tag
     * 
     * @return string
     */
    public function compileOpeningTag() {
        if ($this->comment) {
            return "<!--";
        }

        $attributes = '';
        foreach ($this->attributes as $k => $v) {
            $attributes .= ' ' . $k . '="' . str_replace('"', '\\"', $v) . '"';
        }

        if ($this->void) {
            return sprintf('<%s%s/>', $this->tag, $attributes);
        }

        return sprintf('<%s%s>', $this->tag, $attributes);
    }

    /**
     * Compile node closing tag
     * 
     * @return string
     */
    public function compileClosingTag() {
        if ($this->comment) {
            return "-->";
        }

        if ($this->void) {
            return '';
        }

        return sprintf('</%s>', $this->tag);
    }

    public function compileContent($offset = 0, $size = 4) {
        if ($this->void) {
            return '';
        }

        $indent = str_repeat(' ', $offset * $size);
        $content = '';

        foreach ($this->content as $c) {
            if ($c instanceof Node) {
                $content .= $c->compile($offset, $size) . "\n";
            } else {
                $content .= $indent . wordwrap($c, 100, "\n" . $indent) . "\n";
            }
        }

        return $content;
    }

    /**
     * Convert the node to an indented HTML string
     * 
     * @return string
     */
    public function compile($offset = 0, $size = 4) {
        $indent = str_repeat(' ', $offset * $size);

        if ($this->void) {
            return $indent . $this->compileOpeningTag();
        }

        if ($this->inline) {
            return $indent . $this->minify();
        }

        $html = ($this->tag === 'html') ? "<!DOCTYPE html>\n" : "";
        $html .= $indent . $this->compileOpeningTag() . "\n";
        $html .= rtrim($this->compileContent($offset + 1, $size)) . "\n";
        $html .= $indent . $this->compileClosingTag() . "\n";

        return rtrim($html);
    }

    /**
     * Convert the node to a HTML string
     * 
     * @return string
     */
    public function __toString() {
        return $this->compile();
    }

    ############################################################################

    public function minifyNodeContent() {
        $content = '';

        foreach ($this->content as $c) {
            $content .= !($c instanceof Node) ? $c . ' ' : $c->minify();
        }

        return rtrim($content);
    }

    public function prettifyNodeContent($offset = 0, $size = 4) {
        $content = '';


        foreach ($this->content as $c) {
            if ($c instanceof Node) {
                $content .= $c->prettify($offset, $size);
                $content .= in_array($c->tag, self::NO_SPACE_AFTER) ? "\n" : "\n\n";
            } else {
                $content .= str_repeat(' ', $offset * $size) . rtrim($c) . "\n";
            }
        }

        return $content;
    }

    /**
     * Convert the node to a minified HTML string
     * 
     * @return string
     */
    public function minify() {
        if ($this->void) {
            return $this->compileOpeningTag();
        }

        $open = $this->compileOpeningTag();
        $content = $this->minifyNodeContent();
        $close = $this->compileClosingTag();

        if ($this->tag === 'html') {
            return "<!DOCTYPE html>\n{$open}{$content}{$close}";
        }

        if ($this->comment) {
            return "{$open} {$content} {$close}";
        }

        return "{$open}{$content}{$close}";
    }

}
