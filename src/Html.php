<?php

namespace Bgaze\HtmlFaker;

use Bgaze\HtmlFaker\Nodes\PlainText;
use Bgaze\HtmlFaker\Nodes\Comment;
use Bgaze\HtmlFaker\Nodes\Node;

/**
 * This class offers static helpers to generate and use fluently PlainText, 
 * Comment and Node instance.
 * 
 * It also include helpers for all the HTML5 elements listed on:
 * https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5
 * 
 * Note:
 * I've originally achieved the same in a far more elegant way using __callStatic, 
 * but this breaks IDE intellisense.
 * As this utility is designed to be used fluently, I've choosed to generate and
 * include all the helpers methods.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class Html {
    ### CORE ###

    /**
     * Create and returns a plain text node.
     * 
     * @param string $content
     * @return Bgaze\HtmlFaker\Nodes\PlainText
     */
    public static function txt($content = null) {
        return new PlainText($content);
    }

    /**
     * Create and returns a comment node.
     * 
     * @param mixed $content
     * @return Bgaze\HtmlFaker\Nodes\Comment
     */
    public static function comment($content = null) {
        return new Comment($content);
    }

    /**
     * Create and returns a common HTML node.
     * 
     * @param string $tag
     * @param mixed $content
     * @param array $attributes
     * 
     * @return Bgaze\HtmlFaker\Nodes\Node
     * @throws \Exception
     */
    public static function node($tag, $content = null, array $attributes = []) {
        if (!preg_match('/^[a-zA-Z]([a-zA-Z0-9])*$/', $tag)) {
            throw new \Exception("{$tag} is not a valid tag.");
        }

        $node = new Node($tag);
        $node->setAttributes($attributes);

        if (!in_array($tag, Node::VOID_ELEMENTS)) {
            $node->setContent($content);
        }

        return $node;
    }

    ### HELPERS ###

    /**
     * Create and returns an 'a' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function a($content = null, array $attributes = []) {
        return self::node('a', $content, $attributes);
    }

    /**
     * Create and returns an 'abbr' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function abbr($content = null, array $attributes = []) {
        return self::node('abbr', $content, $attributes);
    }

    /**
     * Create and returns an 'address' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function address($content = null, array $attributes = []) {
        return self::node('address', $content, $attributes);
    }

    /**
     * Create and returns an 'area' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function area(array $attributes = []) {
        return self::node('area', null, $attributes);
    }

    /**
     * Create and returns an 'article' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function article($content = null, array $attributes = []) {
        return self::node('article', $content, $attributes);
    }

    /**
     * Create and returns an 'aside' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function aside($content = null, array $attributes = []) {
        return self::node('aside', $content, $attributes);
    }

    /**
     * Create and returns an 'audio' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function audio($content = null, array $attributes = []) {
        return self::node('audio', $content, $attributes);
    }

    /**
     * Create and returns a 'b' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function b($content = null, array $attributes = []) {
        return self::node('b', $content, $attributes);
    }

    /**
     * Create and returns a 'base' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function base(array $attributes = []) {
        return self::node('base', null, $attributes);
    }

    /**
     * Create and returns a 'bdi' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function bdi($content = null, array $attributes = []) {
        return self::node('bdi', $content, $attributes);
    }

    /**
     * Create and returns a 'bdo' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function bdo($content = null, array $attributes = []) {
        return self::node('bdo', $content, $attributes);
    }

    /**
     * Create and returns a 'blockquote' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function blockquote($content = null, array $attributes = []) {
        return self::node('blockquote', $content, $attributes);
    }

    /**
     * Create and returns a 'body' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function body($content = null, array $attributes = []) {
        return self::node('body', $content, $attributes);
    }

    /**
     * Create and returns a 'br' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function br(array $attributes = []) {
        return self::node('br', null, $attributes);
    }

    /**
     * Create and returns a 'button' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function button($content = null, array $attributes = []) {
        return self::node('button', $content, $attributes);
    }

    /**
     * Create and returns a 'canvas' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function canvas($content = null, array $attributes = []) {
        return self::node('canvas', $content, $attributes);
    }

    /**
     * Create and returns a 'caption' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function caption($content = null, array $attributes = []) {
        return self::node('caption', $content, $attributes);
    }

    /**
     * Create and returns a 'cite' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function cite($content = null, array $attributes = []) {
        return self::node('cite', $content, $attributes);
    }

    /**
     * Create and returns a 'code' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function code($content = null, array $attributes = []) {
        return self::node('code', $content, $attributes);
    }

    /**
     * Create and returns a 'col' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function col(array $attributes = []) {
        return self::node('col', null, $attributes);
    }

    /**
     * Create and returns a 'colgroup' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function colgroup($content = null, array $attributes = []) {
        return self::node('colgroup', $content, $attributes);
    }

    /**
     * Create and returns a 'command' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function command($content = null, array $attributes = []) {
        return self::node('command', $content, $attributes);
    }

    /**
     * Create and returns a 'data' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function data($content = null, array $attributes = []) {
        return self::node('data', $content, $attributes);
    }

    /**
     * Create and returns a 'datalist' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function datalist($content = null, array $attributes = []) {
        return self::node('datalist', $content, $attributes);
    }

    /**
     * Create and returns a 'dd' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function dd($content = null, array $attributes = []) {
        return self::node('dd', $content, $attributes);
    }

    /**
     * Create and returns a 'del' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function del($content = null, array $attributes = []) {
        return self::node('del', $content, $attributes);
    }

    /**
     * Create and returns a 'details' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function details($content = null, array $attributes = []) {
        return self::node('details', $content, $attributes);
    }

    /**
     * Create and returns a 'dfn' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function dfn($content = null, array $attributes = []) {
        return self::node('dfn', $content, $attributes);
    }

    /**
     * Create and returns a 'div' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function div($content = null, array $attributes = []) {
        return self::node('div', $content, $attributes);
    }

    /**
     * Create and returns a 'dl' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function dl($content = null, array $attributes = []) {
        return self::node('dl', $content, $attributes);
    }

    /**
     * Create and returns a 'dt' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function dt($content = null, array $attributes = []) {
        return self::node('dt', $content, $attributes);
    }

    /**
     * Create and returns an 'em' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function em($content = null, array $attributes = []) {
        return self::node('em', $content, $attributes);
    }

    /**
     * Create and returns a 'fieldset' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function fieldset($content = null, array $attributes = []) {
        return self::node('fieldset', $content, $attributes);
    }

    /**
     * Create and returns a 'figcaption' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function figcaption($content = null, array $attributes = []) {
        return self::node('figcaption', $content, $attributes);
    }

    /**
     * Create and returns a 'figure' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function figure($content = null, array $attributes = []) {
        return self::node('figure', $content, $attributes);
    }

    /**
     * Create and returns a 'footer' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function footer($content = null, array $attributes = []) {
        return self::node('footer', $content, $attributes);
    }

    /**
     * Create and returns a 'form' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function form($content = null, array $attributes = []) {
        return self::node('form', $content, $attributes);
    }

    /**
     * Create and returns a 'h1' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function h1($content = null, array $attributes = []) {
        return self::node('h1', $content, $attributes);
    }

    /**
     * Create and returns a 'h2' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function h2($content = null, array $attributes = []) {
        return self::node('h2', $content, $attributes);
    }

    /**
     * Create and returns a 'h3' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function h3($content = null, array $attributes = []) {
        return self::node('h3', $content, $attributes);
    }

    /**
     * Create and returns a 'h4' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function h4($content = null, array $attributes = []) {
        return self::node('h4', $content, $attributes);
    }

    /**
     * Create and returns a 'h5' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function h5($content = null, array $attributes = []) {
        return self::node('h5', $content, $attributes);
    }

    /**
     * Create and returns a 'h6' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function h6($content = null, array $attributes = []) {
        return self::node('h6', $content, $attributes);
    }

    /**
     * Create and returns a 'head' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function head($content = null, array $attributes = []) {
        return self::node('head', $content, $attributes);
    }

    /**
     * Create and returns a 'header' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function header($content = null, array $attributes = []) {
        return self::node('header', $content, $attributes);
    }

    /**
     * Create and returns a 'hgroup' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function hgroup($content = null, array $attributes = []) {
        return self::node('hgroup', $content, $attributes);
    }

    /**
     * Create and returns a 'hr' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function hr(array $attributes = []) {
        return self::node('hr', null, $attributes);
    }

    /**
     * Create and returns a 'html' node.
     * Note that the HTML5 doctype will be automatically included before that element.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function html($content = null, array $attributes = []) {
        return self::node('html', $content, $attributes);
    }

    /**
     * Create and returns an 'i' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function i($content = null, array $attributes = []) {
        return self::node('i', $content, $attributes);
    }

    /**
     * Create and returns an 'iframe' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function iframe($content = null, array $attributes = []) {
        return self::node('iframe', $content, $attributes);
    }

    /**
     * Create and returns an 'img' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function img(array $attributes = []) {
        return self::node('img', null, $attributes);
    }

    /**
     * Create and returns an 'input' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function input(array $attributes = []) {
        return self::node('input', null, $attributes);
    }

    /**
     * Create and returns an 'ins' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function ins($content = null, array $attributes = []) {
        return self::node('ins', $content, $attributes);
    }

    /**
     * Create and returns a 'kbd' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function kbd($content = null, array $attributes = []) {
        return self::node('kbd', $content, $attributes);
    }

    /**
     * Create and returns a 'keygen' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function keygen($content = null, array $attributes = []) {
        return self::node('keygen', $content, $attributes);
    }

    /**
     * Create and returns a 'label' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function label($content = null, array $attributes = []) {
        return self::node('label', $content, $attributes);
    }

    /**
     * Create and returns a 'legend' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function legend($content = null, array $attributes = []) {
        return self::node('legend', $content, $attributes);
    }

    /**
     * Create and returns a 'li' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function li($content = null, array $attributes = []) {
        return self::node('li', $content, $attributes);
    }

    /**
     * Create and returns a 'link' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function link(array $attributes = []) {
        return self::node('link', null, $attributes);
    }

    /**
     * Create and returns a 'map' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function map($content = null, array $attributes = []) {
        return self::node('map', $content, $attributes);
    }

    /**
     * Create and returns a 'mark' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function mark($content = null, array $attributes = []) {
        return self::node('mark', $content, $attributes);
    }

    /**
     * Create and returns a 'math' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function math($content = null, array $attributes = []) {
        return self::node('math', $content, $attributes);
    }

    /**
     * Create and returns a 'menu' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function menu($content = null, array $attributes = []) {
        return self::node('menu', $content, $attributes);
    }

    /**
     * Create and returns a 'meta' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function meta(array $attributes = []) {
        return self::node('meta', null, $attributes);
    }

    /**
     * Create and returns a 'meter' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function meter($content = null, array $attributes = []) {
        return self::node('meter', $content, $attributes);
    }

    /**
     * Create and returns a 'nav' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function nav($content = null, array $attributes = []) {
        return self::node('nav', $content, $attributes);
    }

    /**
     * Create and returns a 'noscript' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function noscript($content = null, array $attributes = []) {
        return self::node('noscript', $content, $attributes);
    }

    /**
     * Create and returns an 'object' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function object($content = null, array $attributes = []) {
        return self::node('object', $content, $attributes);
    }

    /**
     * Create and returns an 'ol' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function ol($content = null, array $attributes = []) {
        return self::node('ol', $content, $attributes);
    }

    /**
     * Create and returns an 'optgroup' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function optgroup($content = null, array $attributes = []) {
        return self::node('optgroup', $content, $attributes);
    }

    /**
     * Create and returns an 'option' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function option($content = null, array $attributes = []) {
        return self::node('option', $content, $attributes);
    }

    /**
     * Create and returns an 'output' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function output($content = null, array $attributes = []) {
        return self::node('output', $content, $attributes);
    }

    /**
     * Create and returns a 'p' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function p($content = null, array $attributes = []) {
        return self::node('p', $content, $attributes);
    }

    /**
     * Create and returns a 'param' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function param(array $attributes = []) {
        return self::node('param', null, $attributes);
    }

    /**
     * Create and returns a 'pre' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function pre($content = null, array $attributes = []) {
        return self::node('pre', $content, $attributes);
    }

    /**
     * Create and returns a 'progress' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function progress($content = null, array $attributes = []) {
        return self::node('progress', $content, $attributes);
    }

    /**
     * Create and returns a 'q' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function q($content = null, array $attributes = []) {
        return self::node('q', $content, $attributes);
    }

    /**
     * Create and returns a 'rp' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function rp($content = null, array $attributes = []) {
        return self::node('rp', $content, $attributes);
    }

    /**
     * Create and returns a 'rt' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function rt($content = null, array $attributes = []) {
        return self::node('rt', $content, $attributes);
    }

    /**
     * Create and returns a 'ruby' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function ruby($content = null, array $attributes = []) {
        return self::node('ruby', $content, $attributes);
    }

    /**
     * Create and returns a 's' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function s($content = null, array $attributes = []) {
        return self::node('s', $content, $attributes);
    }

    /**
     * Create and returns a 'samp' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function samp($content = null, array $attributes = []) {
        return self::node('samp', $content, $attributes);
    }

    /**
     * Create and returns a 'script' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function script($content = null, array $attributes = []) {
        return self::node('script', $content, $attributes);
    }

    /**
     * Create and returns a 'section' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function section($content = null, array $attributes = []) {
        return self::node('section', $content, $attributes);
    }

    /**
     * Create and returns a 'select' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function select($content = null, array $attributes = []) {
        return self::node('select', $content, $attributes);
    }

    /**
     * Create and returns a 'small' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function small($content = null, array $attributes = []) {
        return self::node('small', $content, $attributes);
    }

    /**
     * Create and returns a 'source' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function source(array $attributes = []) {
        return self::node('source', null, $attributes);
    }

    /**
     * Create and returns a 'span' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function span($content = null, array $attributes = []) {
        return self::node('span', $content, $attributes);
    }

    /**
     * Create and returns a 'strong' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function strong($content = null, array $attributes = []) {
        return self::node('strong', $content, $attributes);
    }

    /**
     * Create and returns a 'style' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function style($content = null, array $attributes = []) {
        return self::node('style', $content, $attributes);
    }

    /**
     * Create and returns a 'sub' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function sub($content = null, array $attributes = []) {
        return self::node('sub', $content, $attributes);
    }

    /**
     * Create and returns a 'summary' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function summary($content = null, array $attributes = []) {
        return self::node('summary', $content, $attributes);
    }

    /**
     * Create and returns a 'sup' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function sup($content = null, array $attributes = []) {
        return self::node('sup', $content, $attributes);
    }

    /**
     * Create and returns a 'svg' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function svg($content = null, array $attributes = []) {
        return self::node('svg', $content, $attributes);
    }

    /**
     * Create and returns a 'table' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function table($content = null, array $attributes = []) {
        return self::node('table', $content, $attributes);
    }

    /**
     * Create and returns a 'tbody' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function tbody($content = null, array $attributes = []) {
        return self::node('tbody', $content, $attributes);
    }

    /**
     * Create and returns a 'td' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function td($content = null, array $attributes = []) {
        return self::node('td', $content, $attributes);
    }

    /**
     * Create and returns a 'textarea' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function textarea($content = null, array $attributes = []) {
        return self::node('textarea', $content, $attributes);
    }

    /**
     * Create and returns a 'tfoot' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function tfoot($content = null, array $attributes = []) {
        return self::node('tfoot', $content, $attributes);
    }

    /**
     * Create and returns a 'th' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function th($content = null, array $attributes = []) {
        return self::node('th', $content, $attributes);
    }

    /**
     * Create and returns a 'thead' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function thead($content = null, array $attributes = []) {
        return self::node('thead', $content, $attributes);
    }

    /**
     * Create and returns a 'time' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function time($content = null, array $attributes = []) {
        return self::node('time', $content, $attributes);
    }

    /**
     * Create and returns a 'title' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function title($content = null, array $attributes = []) {
        return self::node('title', $content, $attributes);
    }

    /**
     * Create and returns a 'tr' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function tr($content = null, array $attributes = []) {
        return self::node('tr', $content, $attributes);
    }

    /**
     * Create and returns a 'track' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function track(array $attributes = []) {
        return self::node('track', null, $attributes);
    }

    /**
     * Create and returns an 'u' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function u($content = null, array $attributes = []) {
        return self::node('u', $content, $attributes);
    }

    /**
     * Create and returns an 'ul' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function ul($content = null, array $attributes = []) {
        return self::node('ul', $content, $attributes);
    }

    /**
     * Create and returns a 'var' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function var($content = null, array $attributes = []) {
        return self::node('var', $content, $attributes);
    }

    /**
     * Create and returns a 'video' node.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function video($content = null, array $attributes = []) {
        return self::node('video', $content, $attributes);
    }

    /**
     * Create and returns a 'wbr' node.
     * 
     * @param array $attributes
     * @return Bgaze\HtmlFaker\Nodes\Node
     */
    public static function wbr(array $attributes = []) {
        return self::node('wbr', null, $attributes);
    }

}
