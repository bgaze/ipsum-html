[< Back](../README.md)

## Bgaze\IpsumHtml\Ipsum

This class generates the Lorem Ipsum text.  
It offers three main methods:

### str

Generate a simple string of Lorem Ipsum.

```php
/**
 * @param integer $words    The number of words into the string
 * @return string
 */
public static function str($words)
```

Example:

```php
use Bgaze\IpsumHtml\Ipsum;

echo Ipsum::str(5);
```

Result:

> voluptatem sunt magnam commodi laborum

### sentence

Generate a simple string of Lorem Ipsum with first letter capitalized and trailing dot if requested.

```php
/**
 * @param integer $words    The number of words into the string
 * @param boolean $dot      Wether to include a trailing dot.
 * @return string
 */
public static function sentence($words, $dot = true)
```

Examples:

```php
use Bgaze\IpsumHtml\Ipsum;

echo implode('<br/><br/>', [
    Ipsum::sentence(5),
    Ipsum::sentence(4, false)
]);
```

Result:

> Veniam voluptatum repellendus a delectus.
>
> Perferendis explicabo atque possimus

### text

Generate a Lorem Ipsum text composed of distinct sentences.

The default decoration list (`$tag === true`) :  
`['var', 'abbr', 'sub', 'sup', 'a', 'em', 'strong', 'small', 's', 'q', 'i', 'b', 'u', 'mark', 'br']`

```php
/**
 * @param integer $words            The number of words into the string
 * @param boolean|array $decorate   Wether to decorate the string with inline html tags
 * @return string
 */
public static function text($words, $decorate = false)
```

Examples:

```php
use Bgaze\IpsumHtml\Ipsum;

echo implode("\n\n", [
    Ipsum::text(50),
    Ipsum::text(50, true),
    Ipsum::text(50, ['a', 'strong'])
]);
```

Result:

> Fugit dolor quis eum nihil atque est dolorum expedita cum illum a. Ipsa quae quia qui sequi tempora laboriosam molestias est placeat temporibus voluptates. Quasi dicta fugit eos tempora minima corporis rem excepturi cupiditate fuga libero cum placeat repellat. Consectetur minima rem quos iste impedit quod repellendus accusamus voluptates hic.
>
> <b>Eos sequi laboriosam</b> alias nostrum autem porro at repudiandae <abbr>quia incidunt</abbr> odit numquam enim quo quibusdam amet iure deleniti perspiciatis placeat asperiores fugit odio molestias tempore placeat voluptates <sup>vitae fugit dolorem aliquam</sup>. Quae dicta sequi fugiat consequatur dicta nemo est maxime at ut nam libero quisquam assumenda pariatur. Beatae optio.
>
> <a href="#">Omnis similique nam</a> dolore aliquam odio voluptatum animi. <strong>Veritatis sed culpa</strong> ullam ex occaecati pariatur eaque dignissimos deserunt quod temporibus itaque aut modi atque illum repudiandae. <strong>Molestiae laudantium</strong> ab modi officia porro consequuntur error tempore necessitatibus tenetur illo voluptate excepturi saepe sunt dolorem amet quod temporibus asperiores. Aut reprehenderit eligendi.



