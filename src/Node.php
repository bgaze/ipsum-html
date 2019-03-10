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
     * The class constructor.
     * 
     * @param string $tag           The node tag
     * @param array $attributes     The node attributes
     */
    public function __construct($tag = 'div', array $attributes = []) {
        $this->void = in_array($tag, self::VOID_ELEMENTS);
        $this->content = [];
        $this->tag = $tag;
        $this->attributes = $attributes;
    }

    /**
     * Convert the node to a HTML string
     * 
     * @return string
     */
    public function __toString() {
        $html = ($this->tag === 'html') ? "<!doctype html>\n" : '';

        $html .= '<' . $this->tag;

        foreach ($this->attributes as $k => $v) {
            $html .= ' ' . $k . '="' . str_replace('"', '\\"', $v) . '"';
        }

        if ($this->void) {
            return $html . ' />';
        }

        $html .= '>';

        foreach ($this->content as $c) {
            $html .= $c;
        }

        return $html . '</' . $this->tag . '>';
    }

    /**
     * Generate node using tag as static method.
     * 
     * Example - Both calls are identical :
     * $div = new Node('div', ['id' => 'test']);
     * $div = Node::div(['id' => 'test']);
     * 
     * @param type $name        The tag of the node to generate.
     * @param type $arguments   The arguments passed to the function.
     */
    public static function __callStatic($name, $arguments) {
        return new Node($name, isset($arguments[0]) ? $arguments[0] : []);
    }

    ### GETTERS & SETTERS ###

    /**
     * Is the node a void element (self closing tag)
     * 
     * @return boolean
     */
    public function getVoid() {
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
     */
    public function setTag($tag) {
        $this->tag = $tag;
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
        $this->attributes = $attributes;
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
    public function setContent(array $content) {
        if ($this->void) {
            throw new \Exception("Void elements cannot have children ({$this->tag}).");
        }
        $this->content = $content;
        return $this;
    }

    ### NODE MANIPULATION ###

    /**
     * Add attribute(s) to the node
     * 
     * The $key argument can be an associative array of attributes.
     * 
     * @param mixed $key
     * @param string $value
     * 
     * @return $this
     */
    public function attr($key, $value = null) {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->attr($k, $v);
            }
            return $this;
        }

        if ($value === false) {
            if (isset($this->attributes[$key])) {
                unset($this->attributes[$key]);
            }
            return $this;
        }

        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Append child or children to the node
     * 
     * @param mixed $content
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
        } else {
            $this->content[] = $content;
        }

        return $this;
    }

    /**
     * Prepend child or children to the node
     * 
     * @param type $content
     * @return $this
     * @throws \Exception
     */
    public function prepend($content) {
        if ($this->void) {
            throw new \Exception("Void elements cannot have children ({$this->tag}).");
        }

        if (is_array($content)) {
            foreach ($content as $c) {
                $this->prepend($c);
            }
        } else {
            array_unshift($this->content, $content);
        }

        return $this;
    }

    /**
     * Convert the node to a beautified HTML string
     * 
     * @return string
     */
    public function indent() {
        $this->tidy->parseString($this->__toString()); //parse html into tidy object
        $this->tidy->cleanRepair();

        return $this->indenter->indent($this->__toString());
    }

}
