<?php

namespace Bgaze\HtmlFaker;

use Faker\Generator as Faker;
use Bgaze\HtmlFaker\Node;

/**
 * Description of HtmlFaker
 *
 * @author bgaze
 */
class Generator {

    const DEFAULTS = [
        'p' => 10,
        'h' => 4,
        'ul' => 2,
        'ol' => 2,
        'dl' => 1,
        'bq' => 1,
        'table' => 1,
        'code' => 1,
        'img' => 1,
        'address' => 0,
        'comment' => 1,
    ];
    const DECORATE = [
        'b' => true,
        'u' => true,
        'i' => true,
        'a' => true,
        'code' => true,
    ];

    protected $faker;

    /*
     * MAGIC METHODS
     */

    function __construct(Faker $faker) {
        $this->faker = $faker;
    }

    /*
     * UTILS
     */

    protected function random_chunks($string) {
        $words = explode(' ', $string);

        if (count($words) < 3) {
            return [$string];
        }

        $offset = 0;
        $chunks = [];

        while ($offset < count($words)) {
            $length = rand(2, 6);
            $chunks[] = implode(' ', array_slice($words, $offset, $length));
            $offset += $length;
        }

        return $chunks;
    }

    protected function decorate($string, array $decoration = []) {
        $chunks = $this->random_chunks($string);
        $decorations = array_filter(array_merge(self::DECORATE, $decoration));

        $last = false;
        foreach ($chunks as &$s) {
            if ($last === true) {
                $last = false;
                continue;
            }

            if (rand(0, 2) !== 0) {
                continue;
            }

            $s = Node::make(array_rand($decorations), $s);

            if ($s->getTag() === 'a') {
                $s->setAttribute('href', '#');
            }

            $last = true;
        }

        return implode(' ', $chunks);
    }

    public function string($size = 'md', $decorate = false) {
        $sizes = [
            'xs' => rand(2, 4),
            'sm' => rand(6, 10),
            'md' => rand(15, 20),
            'lg' => rand(30, 25),
            'xl' => rand(60, 80)
        ];

        $string = $this->faker->sentence($sizes[$size], false);

        if ($decorate !== false) {
            return $this->decorate($string, is_array($decorate) ? $decorate : []);
        }

        return $string;
    }

    public function make($tag, $size = 'md', $decorate = false) {
        return Node::make($tag, $this->string($size, $decorate));
    }

    /*
     * ELEMENTS
     */

    public function p($size = null, $decorate = null) {
        if ($size === null) {
            $size = array_rand(array_flip(['md', 'lg', 'xl']));
        }

        if ($decorate === null) {
            $decorate = (rand(0, 1) === 1);
        }

        return $this->make('p', $size, $decorate);
    }

    public function dl($count = null, $dt = 'xs', $dd = 'sm', $decorate = false) {
        if ($count === null) {
            $count = rand(2, 4);
        }

        $dl = Node::make('dl');

        for ($i = 0; $i < $count; $i++) {
            $dl->append($this->make('dt', $dt, $decorate));
            $dl->append($this->make('dd', $dd, $decorate));
            $dl->append('');
        }

        return $dl;
    }

    public function ul($count = null, $size = 'sm', $decorate = false) {
        if ($count === null) {
            $count = rand(2, 4);
        }

        $ul = Node::make('ul');

        for ($i = 0; $i < $count; $i++) {
            $ul->append($this->make('li', $size, $decorate));
        }

        return $ul;
    }

    public function ol($count = null, $size = 'sm', $decorate = false) {
        return $this->ul($count, $size, $decorate)->setTag('ol');
    }

    public function bq($size = 'md', $decorate = false) {
        return $this->make('blockquote', $size, $decorate);
    }

    public function table($cols = 4, $rows = null, $size = 'sm', $decorate = false) {
        if (!$rows) {
            $rows = rand(3, 6);
        }

        $tr = function($type) use($cols, $size, $decorate) {
            $tr = Node::make('tr');
            for ($c = 0; $c < $cols; $c++) {
                $tr->append($this->make($type, $size, $decorate));
            }
            return $tr;
        };

        $thead = Node::make('thead', $tr('th'));

        $tbody = Node::make('tbody');
        for ($r = 0; $r < $rows; $r++) {
            $tbody->append($tr('td'));
        }

        return Node::make('table', [$thead, $tbody]);
    }

    public function img($width = 640, $height = 480, $category = null) {
        return Node::make('img')->setAttribute('src', $this->faker->imageUrl($width, $height, $category));
    }

    public function code() {
        return Node::make('pre')->append(Node::make('code', str_replace(['>', '<'], ['&gt;', '&lt;'], $this->ul())));
    }

    public function comment($multiline = null) {
        $comment = Node::make('!--', $this->string());

        if ($multiline || ($multiline === null && rand(0, 1) === 1)) {
            $comment->append('')->append($this->ul())->append('')->append($this->string());
        }else{
            $comment->setInline(true);
        }

        return $comment;
    }

    /*
     * DOCUMENT
     */

    public function page($title = 'Fake Html', $rows = 50, $defaults = []) {
        return Node::make('html', [
                    Node::make('head', [
                        Node::make('meta')->setAttribute('charset', 'utf-8'),
                        Node::make('title', $title),
                    ]),
                    Node::make('body', $this->generate($rows, $defaults))
                ])->setAttribute('lang', 'en');
    }

    public function generate($rows = 50, $defaults = []) {
        $doc = [];

        $elements = $this->elements($defaults);
        $level = 1;
        $last = null;

        if (in_array('h', $elements)) {
            $doc[] = Node::make('h1', $this->string('sm'));
            $doc[] = '';
            $last = 'h';
            $rows--;
        }

        do {
            $type = $elements[array_rand($elements)];

            if ($type !== 'p' && $last === $type) {
                continue;
            }

            $doc[] = $this->element($type, $level);
            
            if (!in_array($type, ['li'])) {
                $doc[] = '';
            }
            
            $last = $type;
            $rows--;
        } while ($rows > 0);

        return $doc;
    }

    protected function elements($defaults = []) {
        $elements = [];

        foreach (array_filter(array_merge(self::DEFAULTS, $defaults)) as $tag => $weight) {
            for ($i = 0; $i < $weight; $i++) {
                $elements[] = $tag;
            }
        }

        return $elements;
    }

    protected function element($type, &$level) {
        if ($type !== 'h') {
            return $this->{$type}();
        }

        if (rand(0, 1) === 1 && $level < 6) {
            $level++;
        } else if (rand(0, 1) === 1 && $level > 1) {
            $level--;
        }

        return $this->make('h' . $level, 'sm');
    }

}
