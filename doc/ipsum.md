## Bgaze\IpsumHtml\Ipsum

This class generates the Lorem Ipsum text. It offers three main methods:

**str:**

```php
/**
 * Generate a simple string of Lorem Ipsum.
 * 
 * @param integer $words    The number of words into the string
 * @return string
 */
public static function str($words)
```

**sentence:**

```php
/**
 * Generate a simple string of Lorem Ipsum with first letter capitalized
 * and trailing dot if requested.
 * 
 * @param integer $words    The number of words into the string
 * @param boolean $dot      Wether to include a trailing dot.
 * @return string
 */
public static function sentence($words, $dot = true)
```

**text:**

```php
/**
 * Generate a Lorem Ipsum text composed of distinct sentences.
 * 
 * @param integer $words    The number of words into the string
 * @param mixed $decorate   Wether to decorate the string with inline html tags
 *                          Accepts boolean or tag array
 *                          Default tags: ['var', 'abbr', 'sub', 'sup', 'a', 'em', 'strong', 'small', 's', 'q', 'i', 'b', 'u', 'mark', 'br']
 * @return string
 */
public static function text($words, $decorate = false)
```

**Examples:**

```php
use Bgaze\IpsumHtml\Ipsum;

echo implode('<br/><br/>', [
    Ipsum::str(5),
    Ipsum::sentence(5),
    Ipsum::sentence(4, false),
    Ipsum::text(50),
    Ipsum::text(50, true),
    Ipsum::text(50, ['a', 'strong'])
]);
```

This code will generate following texts:

> voluptatem sunt magnam commodi laborum
> 
> Veniam voluptatum repellendus a delectus.
>
> Perferendis explicabo atque possimus
>
> Fugit dolor quis eum nihil atque est dolorum expedita cum illum a. Ipsa quae quia qui sequi tempora laboriosam molestias est placeat temporibus voluptates. Quasi dicta fugit eos tempora minima corporis rem excepturi cupiditate fuga libero cum placeat repellat. Consectetur minima rem quos iste impedit quod repellendus accusamus voluptates hic.
>
> <b>Eos sequi laboriosam</b> alias nostrum autem porro at repudiandae <abbr>quia incidunt</abbr> odit numquam enim quo quibusdam amet iure deleniti perspiciatis placeat asperiores fugit odio molestias tempore placeat voluptates <sup>vitae fugit dolorem aliquam</sup>. Quae dicta sequi fugiat consequatur dicta nemo est maxime at ut nam libero quisquam assumenda pariatur. Beatae optio.
>
> <a href="#">Omnis similique nam</a> dolore aliquam odio voluptatum animi. <strong>Veritatis sed culpa</strong> ullam ex occaecati pariatur eaque dignissimos deserunt quod temporibus itaque aut modi atque illum repudiandae. <strong>Molestiae laudantium</strong> ab modi officia porro consequuntur error tempore necessitatibus tenetur illo voluptate excepturi saepe sunt dolorem amet quod temporibus asperiores. Aut reprehenderit eligendi.



