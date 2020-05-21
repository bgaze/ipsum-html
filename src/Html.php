<?php

namespace Bgaze\IpsumHtml;

use Bgaze\IpsumHtml\Nodes\Comment;
use Bgaze\IpsumHtml\Nodes\Node;
use Bgaze\IpsumHtml\Nodes\PlainText;

/**
 * This class offers static helpers to generate and use fluently PlainText, Comment and Node instance.
 * It offers completion for all non obsoletes or experimental HTML5 elements listed on
 * https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5
 *
 * @author bgaze <benjamin@bgaze.fr>
 *
 * VOIDS ELEMENTS
 * --------------
 * @method static Node area(array $attributes = []) Create a 'area' HTML node.
 * @method static Node base(array $attributes = []) Create a 'base' HTML node.
 * @method static Node br(array $attributes = []) Create a 'br' HTML node.
 * @method static Node col(array $attributes = []) Create a 'col' HTML node.
 * @method static Node embed(array $attributes = []) Create a 'embed' HTML node.
 * @method static Node hr(array $attributes = []) Create a 'hr' HTML node.
 * @method static Node img(array $attributes = []) Create a 'img' HTML node.
 * @method static Node input(array $attributes = []) Create a 'input' HTML node.
 * @method static Node link(array $attributes = []) Create a 'link' HTML node.
 * @method static Node meta(array $attributes = []) Create a 'meta' HTML node.
 * @method static Node param(array $attributes = []) Create a 'param' HTML node.
 * @method static Node source(array $attributes = []) Create a 'source' HTML node.
 * @method static Node track(array $attributes = []) Create a 'track' HTML node.
 * @method static Node wbr(array $attributes = []) Create a 'wbr' HTML node.
 *
 * STANDARD ELEMENTS
 * -----------------
 * @method static Node abbr(mixed $content = null, array $attributes = []) Create a 'abbr' HTML node.
 * @method static Node address(mixed $content = null, array $attributes = []) Create a 'address' HTML node.
 * @method static Node article(mixed $content = null, array $attributes = []) Create a 'article' HTML node.
 * @method static Node aside(mixed $content = null, array $attributes = []) Create a 'aside' HTML node.
 * @method static Node audio(mixed $content = null, array $attributes = []) Create a 'audio' HTML node.
 * @method static Node b(mixed $content = null, array $attributes = []) Create a 'b' HTML node.
 * @method static Node bdi(mixed $content = null, array $attributes = []) Create a 'bdi' HTML node.
 * @method static Node bdo(mixed $content = null, array $attributes = []) Create a 'bdo' HTML node.
 * @method static Node blockquote(mixed $content = null, array $attributes = []) Create a 'blockquote' HTML node.
 * @method static Node body(mixed $content = null, array $attributes = []) Create a 'body' HTML node.
 * @method static Node button(mixed $content = null, array $attributes = []) Create a 'button' HTML node.
 * @method static Node canvas(mixed $content = null, array $attributes = []) Create a 'canvas' HTML node.
 * @method static Node caption(mixed $content = null, array $attributes = []) Create a 'caption' HTML node.
 * @method static Node cite(mixed $content = null, array $attributes = []) Create a 'cite' HTML node.
 * @method static Node code(mixed $content = null, array $attributes = []) Create a 'code' HTML node.
 * @method static Node colgroup(mixed $content = null, array $attributes = []) Create a 'colgroup' HTML node.
 * @method static Node data(mixed $content = null, array $attributes = []) Create a 'data' HTML node.
 * @method static Node datalist(mixed $content = null, array $attributes = []) Create a 'datalist' HTML node.
 * @method static Node dd(mixed $content = null, array $attributes = []) Create a 'dd' HTML node.
 * @method static Node del(mixed $content = null, array $attributes = []) Create a 'del' HTML node.
 * @method static Node details(mixed $content = null, array $attributes = []) Create a 'details' HTML node.
 * @method static Node dfn(mixed $content = null, array $attributes = []) Create a 'dfn' HTML node.
 * @method static Node div(mixed $content = null, array $attributes = []) Create a 'div' HTML node.
 * @method static Node dl(mixed $content = null, array $attributes = []) Create a 'dl' HTML node.
 * @method static Node dt(mixed $content = null, array $attributes = []) Create a 'dt' HTML node.
 * @method static Node em(mixed $content = null, array $attributes = []) Create a 'em' HTML node.
 * @method static Node fieldset(mixed $content = null, array $attributes = []) Create a 'fieldset' HTML node.
 * @method static Node figcaption(mixed $content = null, array $attributes = []) Create a 'figcaption' HTML node.
 * @method static Node figure(mixed $content = null, array $attributes = []) Create a 'figure' HTML node.
 * @method static Node footer(mixed $content = null, array $attributes = []) Create a 'footer' HTML node.
 * @method static Node form(mixed $content = null, array $attributes = []) Create a 'form' HTML node.
 * @method static Node h1(mixed $content = null, array $attributes = []) Create a 'h1' HTML node.
 * @method static Node h2(mixed $content = null, array $attributes = []) Create a 'h2' HTML node.
 * @method static Node h3(mixed $content = null, array $attributes = []) Create a 'h3' HTML node.
 * @method static Node h4(mixed $content = null, array $attributes = []) Create a 'h4' HTML node.
 * @method static Node h5(mixed $content = null, array $attributes = []) Create a 'h5' HTML node.
 * @method static Node h6(mixed $content = null, array $attributes = []) Create a 'h6' HTML node.
 * @method static Node head(mixed $content = null, array $attributes = []) Create a 'head' HTML node.
 * @method static Node header(mixed $content = null, array $attributes = []) Create a 'header' HTML node.
 * @method static Node hgroup(mixed $content = null, array $attributes = []) Create a 'hgroup' HTML node.
 * @method static Node html(mixed $content = null, array $attributes = []) Create a 'html' HTML node.
 * @method static Node i(mixed $content = null, array $attributes = []) Create a 'i' HTML node.
 * @method static Node iframe(mixed $content = null, array $attributes = []) Create a 'iframe' HTML node.
 * @method static Node ins(mixed $content = null, array $attributes = []) Create a 'ins' HTML node.
 * @method static Node kbd(mixed $content = null, array $attributes = []) Create a 'kbd' HTML node.
 * @method static Node label(mixed $content = null, array $attributes = []) Create a 'label' HTML node.
 * @method static Node legend(mixed $content = null, array $attributes = []) Create a 'legend' HTML node.
 * @method static Node li(mixed $content = null, array $attributes = []) Create a 'li' HTML node.
 * @method static Node map(mixed $content = null, array $attributes = []) Create a 'map' HTML node.
 * @method static Node mark(mixed $content = null, array $attributes = []) Create a 'mark' HTML node.
 * @method static Node meter(mixed $content = null, array $attributes = []) Create a 'meter' HTML node.
 * @method static Node nav(mixed $content = null, array $attributes = []) Create a 'nav' HTML node.
 * @method static Node noscript(mixed $content = null, array $attributes = []) Create a 'noscript' HTML node.
 * @method static Node object(mixed $content = null, array $attributes = []) Create a 'object' HTML node.
 * @method static Node ol(mixed $content = null, array $attributes = []) Create a 'ol' HTML node.
 * @method static Node optgroup(mixed $content = null, array $attributes = []) Create a 'optgroup' HTML node.
 * @method static Node option(mixed $content = null, array $attributes = []) Create a 'option' HTML node.
 * @method static Node output(mixed $content = null, array $attributes = []) Create a 'output' HTML node.
 * @method static Node p(mixed $content = null, array $attributes = []) Create a 'p' HTML node.
 * @method static Node pre(mixed $content = null, array $attributes = []) Create a 'pre' HTML node.
 * @method static Node progress(mixed $content = null, array $attributes = []) Create a 'progress' HTML node.
 * @method static Node q(mixed $content = null, array $attributes = []) Create a 'q' HTML node.
 * @method static Node rp(mixed $content = null, array $attributes = []) Create a 'rp' HTML node.
 * @method static Node rt(mixed $content = null, array $attributes = []) Create a 'rt' HTML node.
 * @method static Node ruby(mixed $content = null, array $attributes = []) Create a 'ruby' HTML node.
 * @method static Node s(mixed $content = null, array $attributes = []) Create a 's' HTML node.
 * @method static Node samp(mixed $content = null, array $attributes = []) Create a 'samp' HTML node.
 * @method static Node script(mixed $content = null, array $attributes = []) Create a 'script' HTML node.
 * @method static Node section(mixed $content = null, array $attributes = []) Create a 'section' HTML node.
 * @method static Node select(mixed $content = null, array $attributes = []) Create a 'select' HTML node.
 * @method static Node small(mixed $content = null, array $attributes = []) Create a 'small' HTML node.
 * @method static Node span(mixed $content = null, array $attributes = []) Create a 'span' HTML node.
 * @method static Node strong(mixed $content = null, array $attributes = []) Create a 'strong' HTML node.
 * @method static Node style(mixed $content = null, array $attributes = []) Create a 'style' HTML node.
 * @method static Node sub(mixed $content = null, array $attributes = []) Create a 'sub' HTML node.
 * @method static Node summary(mixed $content = null, array $attributes = []) Create a 'summary' HTML node.
 * @method static Node sup(mixed $content = null, array $attributes = []) Create a 'sup' HTML node.
 * @method static Node svg(mixed $content = null, array $attributes = []) Create a 'svg' HTML node.
 * @method static Node table(mixed $content = null, array $attributes = []) Create a 'table' HTML node.
 * @method static Node tbody(mixed $content = null, array $attributes = []) Create a 'tbody' HTML node.
 * @method static Node td(mixed $content = null, array $attributes = []) Create a 'td' HTML node.
 * @method static Node textarea(mixed $content = null, array $attributes = []) Create a 'textarea' HTML node.
 * @method static Node tfoot(mixed $content = null, array $attributes = []) Create a 'tfoot' HTML node.
 * @method static Node th(mixed $content = null, array $attributes = []) Create a 'th' HTML node.
 * @method static Node thead(mixed $content = null, array $attributes = []) Create a 'thead' HTML node.
 * @method static Node time(mixed $content = null, array $attributes = []) Create a 'time' HTML node.
 * @method static Node title(mixed $content = null, array $attributes = []) Create a 'title' HTML node.
 * @method static Node tr(mixed $content = null, array $attributes = []) Create a 'tr' HTML node.
 * @method static Node u(mixed $content = null, array $attributes = []) Create a 'u' HTML node.
 * @method static Node ul(mixed $content = null, array $attributes = []) Create a 'ul' HTML node.
 * @method static Node var(mixed $content = null, array $attributes = []) Create a 'var' HTML node.
 * @method static Node video(mixed $content = null, array $attributes = []) Create a 'video' HTML node.
 */
class Html
{
    /**
     * Generate a HTML node using tag as function name.
     *
     * Signature for void elements is : tag(array $attributes = [])
     * Signature for other elements is : tag(mixed $content = null, array $attributes = [])
     *
     * @param  string  $name
     * @param  array  $arguments
     *
     * @return Node
     */
    public static function __callStatic($name, $arguments)
    {
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
     * @param  string  $content
     * @return PlainText
     */
    public static function txt($content = null)
    {
        return new PlainText($content);
    }


    /**
     * Create and returns a comment node.
     *
     * @param  mixed  $content
     * @return Comment
     */
    public static function comment($content = null)
    {
        return new Comment($content);
    }


    /**
     * Create and returns a 'a' node. If href is not provided, set it to '#'.
     *
     * @param  mixed  $content
     * @param  array  $attributes
     * @return Node
     */
    public static function a($content = null, array $attributes = [])
    {
        $node = new Node('a', $content);
        $node->setAttributes($attributes);
        if (empty($node->getAttribute('href'))) {
            $node->setAttribute('href', '#');
        }
        return $node;
    }

}
