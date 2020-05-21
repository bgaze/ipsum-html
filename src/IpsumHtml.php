<?php

namespace Bgaze\IpsumHtml;

use Bgaze\IpsumHtml\Nodes;
use Bgaze\IpsumHtml\Nodes\Comment;
use Bgaze\IpsumHtml\Nodes\Node;

/**
 * This class offers static helpers to generate and use fluently HTML node populated with Lorem Ipsum text.
 *
 * @author bgaze <benjamin@bgaze.fr>
 *
 * 1 WORD ELEMENTS
 * ---------------
 * @method static Node var(integer $words = 1, boolean $ucfirst = false, boolean $dot = false) Create a "var" HTML node populated with Lorem Ipsum text.
 * @method static Node abbr(integer $words = 1, boolean $ucfirst = false, boolean $dot = false) Create a "abbr" HTML node populated with Lorem Ipsum text.
 * @method static Node sub(integer $words = 1, boolean $ucfirst = false, boolean $dot = false) Create a "sub" HTML node populated with Lorem Ipsum text.
 * @method static Node sup(integer $words = 1, boolean $ucfirst = false, boolean $dot = false) Create a "sup" HTML node populated with Lorem Ipsum text.
 *
 * SMALL TEXT ELEMENTS
 * -------------------------------
 *
 * LOWERCASE
 * @method static Node a(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "a" HTML node populated with Lorem Ipsum text.
 * @method static Node em(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "em" HTML node populated with Lorem Ipsum text.
 * @method static Node strong(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "strong" HTML node populated with Lorem Ipsum text.
 * @method static Node small(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "small" HTML node populated with Lorem Ipsum text.
 * @method static Node s(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "s" HTML node populated with Lorem Ipsum text.
 * @method static Node q(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "q" HTML node populated with Lorem Ipsum text.
 * @method static Node i(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "i" HTML node populated with Lorem Ipsum text.
 * @method static Node b(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "b" HTML node populated with Lorem Ipsum text.
 * @method static Node u(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "u" HTML node populated with Lorem Ipsum text.
 * @method static Node mark(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "mark" HTML node populated with Lorem Ipsum text.
 * @method static Node span(integer $words = null, boolean $ucfirst = false, boolean $dot = false) Create a "span" HTML node populated with Lorem Ipsum text.
 *
 * CAPITALIZED
 * @method static Node title(integer $words = null, boolean $ucfirst = true, boolean $dot = false) Create a "title" HTML node populated with Lorem Ipsum text.
 * @method static Node dt(integer $words = null, boolean $ucfirst = true, boolean $dot = false) Create a "dt" HTML node populated with Lorem Ipsum text.
 * @method static Node caption(integer $words = null, boolean $ucfirst = true, boolean $dot = false) Create a "caption" HTML node populated with Lorem Ipsum text.
 * @method static Node td(integer $words = null, boolean $ucfirst = true, boolean $dot = false) Create a "td" HTML node populated with Lorem Ipsum text.
 * @method static Node th(integer $words = null, boolean $ucfirst = true, boolean $dot = false) Create a "th" HTML node populated with Lorem Ipsum text.
 * @method static Node legend(integer $words = null, boolean $ucfirst = true, boolean $dot = false) Create a "legend" HTML node populated with Lorem Ipsum text.
 * @method static Node label(integer $words = null, boolean $ucfirst = true, boolean $dot = false) Create a "label" HTML node populated with Lorem Ipsum text.
 *
 * MEDIUM TEXT ELEMENTS
 * --------------------
 * @method static Node h1(integer $words = null, array|bool $decorate = false) Create a "h1" HTML node populated with Lorem Ipsum text.
 * @method static Node h2(integer $words = null, array|bool $decorate = false) Create a "h2" HTML node populated with Lorem Ipsum text.
 * @method static Node h3(integer $words = null, array|bool $decorate = false) Create a "h3" HTML node populated with Lorem Ipsum text.
 * @method static Node h4(integer $words = null, array|bool $decorate = false) Create a "h4" HTML node populated with Lorem Ipsum text.
 * @method static Node h5(integer $words = null, array|bool $decorate = false) Create a "h5" HTML node populated with Lorem Ipsum text.
 * @method static Node h6(integer $words = null, array|bool $decorate = false) Create a "h6" HTML node populated with Lorem Ipsum text.
 * @method static Node li(integer $words = null, array|bool $decorate = false) Create a "li" HTML node populated with Lorem Ipsum text.
 * @method static Node dd(integer $words = null, array|bool $decorate = false) Create a "dd" HTML node populated with Lorem Ipsum text.
 * @method static Node figcaption(integer $words = null, array|bool $decorate = false) Create a "figcaption" HTML node populated with Lorem Ipsum text.
 * @method static Node cite(integer $words = null, array|bool $decorate = false) Create a "cite" HTML node populated with Lorem Ipsum text.
 * @method static Node dfn(integer $words = null, array|bool $decorate = false) Create a "dfn" HTML node populated with Lorem Ipsum text.
 * @method static Node samp(integer $words = null, array|bool $decorate = false) Create a "samp" HTML node populated with Lorem Ipsum text.
 *
 * LARGE TEXT ELEMENTS
 * -------------------
 * @method static Node p(integer $words = null, array|bool $decorate = true) Create a "p" HTML node populated with Lorem Ipsum text.
 * @method static Node bq(integer $words = null, array|bool $decorate = true) Create a "bq" HTML node populated with Lorem Ipsum text.
 */
class IpsumHtml
{
    ### BASE ELEMENTS ###

    /**
     * These tags will contain only one word.
     */
    const WORD = ['var', 'abbr', 'sub', 'sup'];

    /*     * *
     * These tags will contains 2-4 word and won't be capitalized by default.
     */
    const INLINE = ['a', 'em', 'strong', 'small', 's', 'q', 'i', 'b', 'u', 'mark', 'span'];

    /*     * *
     * These tags will contains 2-4 word and will be capitalized by default.
     */
    const SMALL = ['title', 'dt', 'caption', 'td', 'th', 'legend', 'label'];

    /*     * *
     * These tags will contains 6-10 word and will be capitalized by default but not decorated.
     */
    const MEDIUM = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'li', 'dd', 'figcaption', 'cite', 'dfn', 'samp'];


    /**
     * Generate a HTML node using his tag as function name.
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
        // Check if tag in categorie.
        $word = in_array($name, self::WORD);
        $inline = in_array($name, self::INLINE);
        $small = in_array($name, self::SMALL);
        $medium = in_array($name, self::MEDIUM);

        // Get words parameter if provided.
        $words = null;
        if (isset($arguments[0]) && is_int($arguments[0]) && $arguments[0] > 0) {
            $words = $arguments[0];
        }

        // If medium or large (default), text can be decorated.
        if (!$word && !$inline && !$small) {
            // Randomize words number if undefined.
            if ($words === null) {
                $words = $medium ? rand(6, 10) : rand(15, 80);
            }

            // Get $decorate parameter if provided.
            $decorate = !$medium;
            if (isset($arguments[1]) && is_array($arguments[1])) {
                $decorate = $arguments[1];
            }

            // Create HTML node.
            return Html::{$name}(Ipsum::text($words, $decorate));
        }

        // Create the string, randomize words number if undefined.
        if ($words === null) {
            $words = $word ? 1 : rand(2, 4);
        }

        $str = Ipsum::str($words);

        // Manage first letter case.
        $ucfirst = $small;
        if (isset($arguments[1]) && is_bool($arguments[1])) {
            $ucfirst = $arguments[1];
        }
        if ($ucfirst) {
            $str = ucfirst($str);
        }

        // Manage trailing dot.
        $dot = false;
        if (isset($arguments[2]) && is_bool($arguments[2])) {
            $dot = $arguments[1];
        }
        if ($dot) {
            $str .= '.';
        }

        // Create HTML node.
        return Html::{$name}($str);
    }

    ### NODE SELECTION GENERATION ###


    /**
     * This is the default list of tags that will be used when generating HTML content.
     * The key is the tag name and the value its weight (probability to appear).
     */
    const RANDOM = [
        'p' => 10,
        'ul' => 1,
        'ol' => 1,
        'dl' => 1,
        'bq' => 1,
        'table' => 1,
        'code' => 1,
        'img' => 1,
        'figure' => 1,
        'comment' => 1,
    ];


    /**
     * Generate randomly an array of Lorem Ipsum HTML nodes.
     *
     * @param  integer  $count  The number of nodes to generate
     * @param  null|array  $tags  An optional array to define the tags to use (tags names as keys and weight as value).
     *
     * @return array
     */
    public static function random($count, $tags = null)
    {
        if (empty($tags)) {
            $tags = self::RANDOM;
        }

        $elements = [];
        foreach (array_filter($tags) as $tag => $weight) {
            for ($i = 0; $i < $weight; $i++) {
                $elements[] = $tag;
            }
        }

        $doc = [];
        $last = null;
        do {
            $type = $elements[array_rand($elements)];

            if ($type === $last) {
                continue;
            }

            $doc[] = call_user_func(array(self::class, $type));

            $last = $type;
            $count--;
        } while ($count > 0);

        return $doc;
    }


    /**
     * Generate randomly an array of Lorem Ipsum HTML nodes hierarchically
     * organised with headers (h1-h6 nodes).
     *
     * @param  integer  $count  The number of nodes to generate
     * @param  null|array  $tags  An optional array to define the tags to use (tags names as keys and weight as value).
     * 
     * @return array
     */
    public static function document($count, $tags = null)
    {
        if (empty($tags)) {
            $tags = self::RANDOM;
        }

        for ($i = 0; $i < 7; $i++) {
            if (isset($tags['h' . $i])) {
                unset($tags['h' . $i]);
            }
        }

        $document = [];
        $document[] = self::h1();
        $level = 1;
        $last = 1;

        foreach (self::random($count - 1, $tags) as $n => $node) {
            if ($n === $count - 2 || is_int($last) || rand(0, 2) > 0) {
                $document[] = $node;
                $last = ($node instanceof Nodes\Comment) ? 'comment' : $node->getTag();
                continue;
            }

            if (rand(0, 1) === 1 && $level < 6) {
                $level++;
            } else {
                if (rand(0, 1) === 1 && $level > 1) {
                    $level--;
                }
            }

            $last = $level;
            $document[] = self::{'h' . $last}();
        }

        return $document;
    }


    /**
     * Generate a complete Lorem Ipsum webpage, hierarchically organised with
     * headers (h1-h6 nodes).
     *
     * @param  integer  $count  The number of nodes to generate
     * @param  null|array  $tags  An optional array to define the tags to use (tags names as keys and weight as value).
     * @param  string  $lang  The lang attribute of the "html" node.
     * 
     * @return Node
     */
    public static function webpage($count, $tags = null, $lang = 'en')
    {
        $body = Html::body();
        foreach (self::document($count, $tags) as $node) {
            $body->append($node)->append('');
        }

        $head = Html::head([
            Html::meta(['charset' => 'utf-8']),
            IpsumHtml::title()
        ]);

        return Html::html([$head, $body], ['lang' => $lang]);
    }

    ### COMPLEX ELEMENTS ###


    /**
     * Generate a Lorem Ipsum "dl" node.
     *
     * @param  null|integer  $count  The number of dt/dd pairs it contains (2-4 if null)
     * @param  null|integer  $dtWords  The number of words into dt elements (2-4 if null)
     * @param  null|integer  $ddWords  The number of words into dd elements (6-10 if null)
     * 
     * @return Node
     */
    public static function dl($count = null, $dtWords = null, $ddWords = null)
    {
        if ($count === null) {
            $count = rand(2, 4);
        }

        $dl = Html::dl();
        for ($i = 0; $i < $count; $i++) {
            $dl->append([self::dt($dtWords), self::dd($ddWords), '']);
        }

        return $dl;
    }


    /**
     * Generate a Lorem Ipsum "ul" node.
     *
     * @param  null|integer  $count  The number of items it contains (2-4 if null)
     * @param  null|integer  $words  The number of words into items (2-4 if null)
     * 
     * @return Node
     */
    public static function ul($count = null, $words = null)
    {
        if ($count === null) {
            $count = rand(2, 4);
        }

        $ul = Html::ul();
        for ($i = 0; $i < $count; $i++) {
            $ul->append(self::li($words));
        }

        return $ul;
    }


    /**
     * Generate a Lorem Ipsum "ol" node.
     *
     * @param  null|integer  $count  The number of items it contains (2-4 if null)
     * @param  null|integer  $words  The number of words into items (2-4 if null)
     *
     * @return Node
     */
    public static function ol($count = null, $words = null)
    {
        return self::ul($count, $words)->setTag('ol');
    }


    /**
     * Generate a Lorem Ipsum "tr" node.
     *
     * @param  null|integer  $cols  The number of columns (3-5 if null)
     * @param  boolean  $th  Use "th" for cells instead of "td"?
     * @param  null|integer  $words  The number of words into cells (2-4 if null)
     *
     * @return Node
     */
    public static function tr($cols = null, $th = false, $words = null)
    {
        if (!$cols) {
            $cols = rand(3, 5);
        }

        $tr = Html::tr();

        for ($c = 0; $c < $cols; $c++) {
            $tr->append(self::{$th ? 'th' : 'td'}($words));
        }

        return $tr;
    }


    /**
     * Generate a Lorem Ipsum "thead" node containing a heading row.
     *
     * @param  null|integer  $cols  The number of columns (3-5 if null)
     * @param  null|integer  $words  The number of words into cells (2-4 if null)
     *
     * @return Node
     */
    public static function thead($cols = null, $words = null)
    {
        if (!$cols) {
            $cols = rand(3, 5);
        }
        return Html::thead(self::tr($cols, true, $words));
    }


    /**
     * Generate a Lorem Ipsum "tbody" node containing several rows.
     *
     * @param  null|integer  $cols  The number of columns (3-5 if null)
     * @param  null|integer  $rows  The number of rows (4-10 if null)
     * @param  null|integer  $words  The number of words into cells (2-4 if null)
     *
     * @return Node
     */
    public static function tbody($cols = null, $rows = null, $words = null)
    {
        if (!$cols) {
            $cols = rand(3, 5);
        }

        if (!$rows) {
            $rows = rand(3, 6);
        }

        $tbody = Html::tbody();
        for ($i = 0; $i < $rows; $i++) {
            $tbody->append(self::tr($cols, false, $words));
        }
        return $tbody;
    }


    /**
     * Generate a Lorem Ipsum "table" node with header and content.
     *
     * @param  null|integer  $cols  The number of columns (3-5 if null)
     * @param  null|integer  $rows  The number of rows (4-10 if null)
     * @param  null|integer  $words  The number of words into cells (2-4 if null)
     *
     * @return Node
     */
    public static function table($cols = null, $rows = null, $words = null)
    {
        if (!$cols) {
            $cols = rand(3, 5);
        }

        if (!$rows) {
            $rows = rand(3, 6);
        }

        return Html::table([
            self::thead($cols, $words),
            self::tbody($cols, $rows, $words)
        ]);
    }


    /**
     * Generate a Lorem Ipsum "img" node thanks to https://picsum.photos/
     *
     * @param  integer  $width  The width of the image in pixels
     * @param  integer  $height  The height of the image in pixels
     * @param  null|boolean  $grayscale  Get a grayscale image (random if null)
     *
     * @return Node
     */
    public static function img($width = 640, $height = 480, $grayscale = null)
    {
        if ($grayscale === null) {
            $grayscale = (rand(0, 1) === 0);
        }

        $src = 'https://picsum.photos/';
        if ($grayscale) {
            $src .= 'g/';
        }
        $src .= $width . '/' . $height . '/?image=' . rand(0, 1084);

        return Html::img(['src' => $src])->setAttribute('alt', Ipsum::str(rand(6, 10)));
    }


    /**
     * Generate a Lorem Ipsum "figure" node thanks to https://picsum.photos/
     *
     * @param  integer  $width  The width of the image in pixels
     * @param  integer  $height  The height of the image in pixels
     * @param  null|boolean  $grayscale  Get a grayscale image (random if null)
     *
     * @return Node
     */
    public static function figure($width = 640, $height = 480, $grayscale = null)
    {
        $img = self::img($width, $height, $grayscale);
        $caption = Html::figcaption($img->getAttribute('alt'));
        return Html::figure([$img, $caption]);
    }


    /**
     * Generate a Lorem Ipsum code block ("pre > code").
     *
     * @param  null|integer  $count  The number of code samples into d=the block (1-3 if null)
     *
     * @return Node
     */
    public static function code($count = null)
    {
        if ($count === null) {
            $count = rand(1, 3);
        }

        $content = self::random($count, [
            'dl' => 1,
            'ul' => 2,
            'ol' => 2,
            'figure' => 2,
            'bq' => 3,
            'img' => 3,
            'comment' => 1,
        ]);

        return Html::pre()->append(Html::code(htmlspecialchars(implode("\n\n", $content))));
    }


    /**
     * Generate a Lorem Ipsum "comment" node.
     *
     * @param  boolean  $inline  Is the comment an inline comment (random if null)
     *
     * @return Comment
     */
    public static function comment($inline = null)
    {
        if ($inline === null) {
            $inline = (rand(0, 1) === 0);
        }

        $comment = Html::comment()->setInline($inline);

        if ($inline) {
            $comment->append(Ipsum::str(rand(6, 10)));
        } else {
            $comment->append([
                Ipsum::str(rand(6, 30)),
                '',
                self::random(1, ['ul' => 1, 'ol' => 1, 'p' => 1, 'bq' => 1, 'figure' => 1, 'img' => 1,]),
                '',
                Ipsum::str(rand(6, 30))
            ]);
        }

        return $comment;
    }

}
