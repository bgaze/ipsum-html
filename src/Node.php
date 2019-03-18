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
     * The default configuration for Tidy
     */
    const TIDY = [
        'indent' => true,
        'indent-spaces' => 4,
        'new-inline-tags' => 'li, h1, h2',
        'output-html' => true,
        'show-body-only' => true,
        'tidy-mark' => false,
        'vertical-space' => true,
        'wrap' => 120
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
    public function __construct($tag = 'div', $content = null) {
        $this->void = in_array($tag, self::VOID_ELEMENTS);
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
    public static function make($tag = 'div', $content = null) {
        return new Node($tag, $content);
    }

    ### DISPLAY ###

    /**
     * Convert the node to a HTML string
     * 
     * @return string
     */
    public function __toString() {
        if ($this->comment) {
            $tmp = array_map(function($c) {
                return ($c instanceof Node) ? $c->tidy() : $c;
            }, $this->content);

            $template = (count($this->content) > 1) ? "<!--\n%s\n-->" : "<!-- %s -->";

            return sprintf($template, implode("\n", $tmp));
        }

        $attributes = '';
        foreach ($this->attributes as $k => $v) {
            $attributes .= ' ' . $k . '="' . str_replace('"', '\\"', $v) . '"';
        }

        if ($this->void) {
            return sprintf('<%s%s/>', $this->tag, $attributes);
        }

        return sprintf('<%s%s>%s</%s>', $this->tag, $attributes, implode('', $this->content), $this->tag);
    }

    /**
     * Convert the node to a beautified HTML string
     * 
     * @return string
     */
    public function tidy($config = []) {
        if ($this->tag === 'html') {
            $config['show-body-only'] = false;
        }

        $tidy = new \Tidy();
        $tidy->parseString($this->__toString(), array_merge(self::TIDY, $config), 'utf8');
        $tidy->cleanRepair();

        return $tidy;
    }

    /**
     * Convert the node to a beautified HTML string
     * 
     * The output of this function is prettier and more compact 
     * than $this->tidy() result, but cannot be configured.
     * 
     * @return string
     */
    public function prettify() {
        $transformers = [
            '/(<h[1-6]>|<li>|<th>|<td>|<dd>|<dt>)\s+/' => '$1',
            '/\s+(<\/h[1-6]>|<\/li>|<\/th>|<\/td>|<\/dd>|<\/dt>)/' => '$1',
            '/(<\/li>|<\/dt>|<\/thead>|<\/tr>)\n+/' => "$1\n",
            '/(-->)\n+/' => "$1\n\n",
            '/\n+( +<!--)/' => "\n\n$1",
            '/( +<img src="[^"]+">)/' => "\n$1\n",
        ];

        return preg_replace(array_keys($transformers), array_values($transformers), $this->tidy());
    }

    ### GETTERS & SETTERS ###

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
        $this->attributes = [];
        $this->attr($attributes);
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
        $this->content = [];
        $this->append($content);
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
        if ($this->comment) {
            throw new \Exception("Comments cannot have attributes.");
        }

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
     * Add a class attribute to the node.
     * 
     * @param string $class
     * 
     * @return $this
     */
    public function addClass($class) {
        $attrs = $this->getAttributes();

        if (isset($attrs['class'])) {
            $classes = preg_split('/\s/', $attrs['class'], -1, PREG_SPLIT_NO_EMPTY);
            $classes[] = $class;
            $class = implode(' ', array_unique($classes));
        }

        $this->attr('class', $class);
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
     * Prepend child or children to the node
     * 
     * @param type $content
     * 
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
            return $this;
        }

        array_unshift($this->content, $content);

        return $this;
    }

    ### NODE CHILDREN MANIPULATION ###

    /**
     * Create a node, append it to current node, then return the child
     * 
     * @param string $tag           The node tag
     * @param mixed $content        The node content
     * 
     * @return Bgaze\HtmlFaker\Node
     */
    public function child($tag = 'div', $content = null) {
        $child = self::make($tag, $content);

        $this->append($child);

        return $child;
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

    /**
     * Prepend current node to a node
     * 
     * @param \Bgaze\HtmlFaker\Node $node
     * 
     * @return $this
     */
    public function prependTo(Node $node) {
        $node->prepend($node);

        return $this;
    }

    /**
     * Find child or children of current node.
     * 
     * @param mixed $tag        The node tag to find
     *                          If ($tag === true) get all children that are an instance of Node
     *                          If ($tag === false) get all children that are not an instance of Node (string)
     * 
     * @param integer $index    The optional index of the children to return
     *                          If ommitted, all the results are returned
     *                          If not founded, null is returned
     * 
     * @return mixed
     */
    public function find($tag, $index = null) {
        $match = array_filter($this->content, function($v) use($tag) {
            if ($tag === true) {
                return ($v instanceof Node);
            }

            if ($tag === false) {
                return !($v instanceof Node);
            }

            return ($v instanceof Node && $v->getTag() === $tag);
        });

        if (empty($index)) {
            return $match;
        }

        if (isset($match[$index])) {
            return $match[$index];
        }

        return null;
    }

}
