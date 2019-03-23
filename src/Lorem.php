<?php

namespace Bgaze\HtmlFaker;

use Bgaze\HtmlFaker\Html;
use Bgaze\HtmlFaker\Nodes\Node;

/**
 * Description of Lorem
 *
 * @author bgaze
 */
class Lorem {

    /**
     * The list of words used to generate Lorem Ipsum.
     */
    const WORDS = [
        'alias', 'consequatur', 'aut', 'perferendis', 'sit', 'voluptatem',
        'accusantium', 'doloremque', 'aperiam', 'eaque', 'ipsa', 'quae', 'ab',
        'illo', 'inventore', 'veritatis', 'et', 'quasi', 'architecto',
        'beatae', 'vitae', 'dicta', 'sunt', 'explicabo', 'aspernatur', 'aut',
        'odit', 'aut', 'fugit', 'sed', 'quia', 'consequuntur', 'magni',
        'dolores', 'eos', 'qui', 'ratione', 'voluptatem', 'sequi', 'nesciunt',
        'neque', 'dolorem', 'ipsum', 'quia', 'dolor', 'sit', 'amet',
        'consectetur', 'adipisci', 'velit', 'sed', 'quia', 'non', 'numquam',
        'eius', 'modi', 'tempora', 'incidunt', 'ut', 'labore', 'et', 'dolore',
        'magnam', 'aliquam', 'quaerat', 'voluptatem', 'ut', 'enim', 'ad',
        'minima', 'veniam', 'quis', 'nostrum', 'exercitationem', 'ullam',
        'corporis', 'nemo', 'enim', 'ipsam', 'voluptatem', 'quia', 'voluptas',
        'sit', 'suscipit', 'laboriosam', 'nisi', 'ut', 'aliquid', 'ex', 'ea',
        'commodi', 'consequatur', 'quis', 'autem', 'vel', 'eum', 'iure',
        'reprehenderit', 'qui', 'in', 'ea', 'voluptate', 'velit', 'esse',
        'quam', 'nihil', 'molestiae', 'et', 'iusto', 'odio', 'dignissimos',
        'ducimus', 'qui', 'blanditiis', 'praesentium', 'laudantium', 'totam',
        'rem', 'voluptatum', 'deleniti', 'atque', 'corrupti', 'quos',
        'dolores', 'et', 'quas', 'molestias', 'excepturi', 'sint',
        'occaecati', 'cupiditate', 'non', 'provident', 'sed', 'ut',
        'perspiciatis', 'unde', 'omnis', 'iste', 'natus', 'error',
        'similique', 'sunt', 'in', 'culpa', 'qui', 'officia', 'deserunt',
        'mollitia', 'animi', 'id', 'est', 'laborum', 'et', 'dolorum', 'fuga',
        'et', 'harum', 'quidem', 'rerum', 'facilis', 'est', 'et', 'expedita',
        'distinctio', 'nam', 'libero', 'tempore', 'cum', 'soluta', 'nobis',
        'est', 'eligendi', 'optio', 'cumque', 'nihil', 'impedit', 'quo',
        'porro', 'quisquam', 'est', 'qui', 'minus', 'id', 'quod', 'maxime',
        'placeat', 'facere', 'possimus', 'omnis', 'voluptas', 'assumenda',
        'est', 'omnis', 'dolor', 'repellendus', 'temporibus', 'autem',
        'quibusdam', 'et', 'aut', 'consequatur', 'vel', 'illum', 'qui',
        'dolorem', 'eum', 'fugiat', 'quo', 'voluptas', 'nulla', 'pariatur',
        'at', 'vero', 'eos', 'et', 'accusamus', 'officiis', 'debitis', 'aut',
        'rerum', 'necessitatibus', 'saepe', 'eveniet', 'ut', 'et',
        'voluptates', 'repudiandae', 'sint', 'et', 'molestiae', 'non',
        'recusandae', 'itaque', 'earum', 'rerum', 'hic', 'tenetur', 'a',
        'sapiente', 'delectus', 'ut', 'aut', 'reiciendis', 'voluptatibus',
        'maiores', 'doloribus', 'asperiores', 'repellat'
    ];

    /*
     * The default list of tags used to decorate string.
     */
    const DECORATE = ['b', 'u', 'i', 'a', 'code', 'br'];

    /**
     * Generate a simple string of Lorem Ipsum.
     * 
     * @param integer $words    The number of words into the string
     * @return string
     */
    public static function str($words) {
        $w = array_rand(array_flip(self::WORDS), $words);

        if (!is_array($w)) {
            return $w;
        }

        return implode(' ', $w);
    }

    /**
     * Generate a simple string of Lorem Ipsum with first letter capitalized
     * and trailing dot if requested.
     * 
     * @param integer $words    The number of words into the string
     * @param type $dot         Wether to include a trailing dot.
     * @return string
     */
    public static function sentence($words, $dot = true) {
        $sentence = ucfirst(self::str($words));

        if ($dot) {
            $sentence .= '.';
        }

        return $sentence;
    }

    /**
     * Generated a Lorem Ipsum text composed of distinct sentences.
     * 
     * @param integer $words    The number of words into the string
     * @return string
     */
    public static function text($words) {
        $text = [];
        $count = 0;

        while ($count < $words) {
            if ($words - $count < 6) {
                $size = $words - $count;
            } else if ($words - $count < 15) {
                $size = rand(6, $words - $count);
            } else {
                $size = rand(6, 15);
            }

            $text[] = self::sentence($size);
            $count += $size;
        }

        return implode(' ', $text);
    }

    /**
     * Generate a Lorem Ipsum text decorated with inline HTML tags.
     * 
     * @param integer $words    The number of words into the text
     * @param array $decorate   The tags to use to decorate the text
     *                          Defaults: ['b', 'u', 'i', 'a', 'code']
     * @return type
     */
    public static function decoratedText($words, array $decorate = []) {
        $text = [];
        $br = false;
        $count = 0;
        $dot = true;
        $decorated = false;

        // Prepare decorations list.
        if (empty($decorate)) {
            $decorate = self::DECORATE;
        }
        foreach ($decorate as $key => $tag) {
            if ($tag === 'br') {
                $br = true;
            }
            if (in_array($tag, Node::VOID_ELEMENTS)) {
                unset($key);
            }
        }
        $decorations = array_flip($decorate);

        // Generate text chunks to reach required length.
        while ($count < $words) {
            // Is this chunk decorated ?
            $decorated = (!$decorated && rand(0, 4) < 2);

            // Define chunk size.
            if ($words - $count < 5) {
                $size = $words - $count;
            } else {
                $size = $decorated ? rand(2, 4) : rand(4, 6);
            }
            $count += $size;

            // Manage sentences start.
            $chunk = $dot ? self::sentence($size, false) : self::str($size);

            // Decorate if needed.
            if ($decorated) {
                $node = Html::node(array_rand($decorations), $chunk);
                if ($node->getTag() === 'a') {
                    $node->setAttribute('href', '#');
                }
                $chunk = $node->minify();
            }

            // Manage sentences end.
            $dot = (rand(0, 4) === 0);
            if ($dot) {
                $chunk .= '.';
                if ($br && rand(0, 4) === 0) {
                    $chunk .= HTML::br();
                }
            }

            // Add to text.
            $text[] = $chunk;
        }

        return trim(implode(' ', $text), '.') . '.';
    }

}
