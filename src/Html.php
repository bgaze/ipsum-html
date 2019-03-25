<?php

namespace Bgaze\IpsumHtml;

use Bgaze\IpsumHtml\Nodes\PlainText;
use Bgaze\IpsumHtml\Nodes\Comment;
use Bgaze\IpsumHtml\Nodes\Node;

/**
 * This class offers static helpers to generate and use fluently PlainText, 
 * Comment and Node instance.
 *
 * It offers completion for all the HTML5 elements listed on that are not obsoletes or experimentals:
 * https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5
 * 
 * NOTE:
 * -----
 * The phpDocumentor "method" tag is not well handled by many editors when using the "static" modifier.
 * That why I've declared this class methods as non static.
 * In Netbeans IDE, you can adjust your options by checking "Also Non-Static Methods after ::" 
 * into "Tools > Options > Code Completion > PHP".
 * 
 * @author bgaze <benjamin@bgaze.fr>
 * 
 * VOIDS ELEMENTS
 * --------------
 * @method \Bgaze\IpsumHtml\Nodes\Node area(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'area' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node base(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'base' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node br(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'br' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node col(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'col' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node embed(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'embed' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node hr(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'hr' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node img(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'img' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node input(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'input' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node link(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'link' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node meta(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'meta' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node param(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'param' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node source(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'source' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node track(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'track' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node wbr(array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'wbr' HTML node.
 * 
 * STANDART ELEMENTS
 * -----------------
 * @method \Bgaze\IpsumHtml\Nodes\Node abbr(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'abbr' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node address(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'address' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node article(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'article' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node aside(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'aside' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node audio(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'audio' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node b(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'b' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node bdi(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'bdi' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node bdo(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'bdo' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node blockquote(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'blockquote' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node body(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'body' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node button(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'button' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node canvas(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'canvas' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node caption(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'caption' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node cite(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'cite' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node code(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'code' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node colgroup(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'colgroup' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node data(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'data' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node datalist(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'datalist' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node dd(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'dd' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node del(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'del' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node details(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'details' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node dfn(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'dfn' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node div(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'div' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node dl(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'dl' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node dt(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'dt' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node em(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'em' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node fieldset(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'fieldset' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node figcaption(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'figcaption' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node figure(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'figure' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node footer(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'footer' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node form(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'form' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node h1(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'h1' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node h2(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'h2' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node h3(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'h3' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node h4(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'h4' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node h5(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'h5' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node h6(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'h6' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node head(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'head' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node header(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'header' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node hgroup(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'hgroup' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node html(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'html' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node i(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'i' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node iframe(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'iframe' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node ins(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'ins' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node kbd(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'kbd' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node label(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'label' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node legend(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'legend' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node li(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'li' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node map(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'map' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node mark(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'mark' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node meter(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'meter' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node nav(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'nav' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node noscript(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'noscript' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node object(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'object' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node ol(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'ol' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node optgroup(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'optgroup' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node option(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'option' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node output(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'output' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node p(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'p' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node pre(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'pre' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node progress(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'progress' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node q(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'q' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node rp(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'rp' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node rt(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'rt' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node ruby(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'ruby' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node s(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 's' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node samp(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'samp' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node script(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'script' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node section(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'section' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node select(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'select' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node small(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'small' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node span(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'span' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node strong(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'strong' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node style(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'style' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node sub(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'sub' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node summary(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'summary' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node sup(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'sup' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node svg(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'svg' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node table(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'table' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node tbody(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'tbody' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node td(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'td' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node textarea(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'textarea' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node tfoot(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'tfoot' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node th(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'th' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node thead(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'thead' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node time(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'time' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node title(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'title' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node tr(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'tr' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node u(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'u' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node ul(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'ul' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node var(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'var' HTML node.
 * @method \Bgaze\IpsumHtml\Nodes\Node video(mixed $content = null The content of the node: string/node/array, array $attributes = [] An associative array of attributes: ['attribute name' => 'attribute value']) Create a 'video' HTML node.
 */
class Html {
    /**
     * Generate a HTML node using his tag as function name.
     * 
     * Signature for void elements is : tag(array $attributes = [])
     * Signature for other elements is : tag(mixed $content = null, array $attributes = [])
     * 
     * @param type $name
     * @param type $arguments
     * @return Bgaze\IpsumHtml\Nodes\Node
     */
    public static function __callStatic($name, $arguments) {
        $node = new Node($name);

        if ($node->isVoid()) {
            if (isset($arguments[0]) && is_array($arguments[0])) {
                $node->setAttributes($arguments[0]);
            }
            return $node;
        }

        if (isset($arguments[0])) {
            $node->append($arguments[0]);
        }

        if (isset($arguments[1]) && is_array($arguments[1])) {
            $node->setAttributes($arguments[1]);
        }

        return $node;
    }

    /**
     * Create and returns a plain text node.
     * 
     * @param string $content
     * @return Bgaze\IpsumHtml\Nodes\PlainText
     */
    public static function txt($content = null) {
        return new PlainText($content);
    }

    /**
     * Create and returns a comment node.
     * 
     * @param mixed $content
     * @return Bgaze\IpsumHtml\Nodes\Comment
     */
    public static function comment($content = null) {
        return new Comment($content);
    }

    /**
     * Create and returns a 'a' node.
     * If href is not provided, set it to '#'.
     * 
     * @param mixed $content
     * @param array $attributes
     * @return Bgaze\IpsumHtml\Nodes\Node
     */
    public static function a($content = null, array $attributes = []) {
        $node = new Node('a', $content);
        $node->setAttributes($attributes);
        if (empty($node->getAttribute('href'))) {
            $node->setAttribute('href', '#');
        }
        return $node;
    }

}
