> **Note about code completion**  
> IpsumHtml does an heavy usage of PHP `__callStatic` method, so using phpDocumentor is necessary to provide code completion.
> Sadly, the phpDocumentor `@method` tag isn't well handled by many editors when using the `static` modifier.
> 
> A workaround, used in this lib, is to declared static methods as non-static into phpDocumentor blocks, 
> then to configure the IDE to allow non-static methods after `::`.  
> In Netbeans IDE, you can do that by checking `Also Non-Static Methods after ::` into `Tools > Options > Code Completion > PHP`.

# IpsumHtml

A PHP utility that allows to generate Lorem Ipsum HTML.  
It is usefull to generate fake HTML content, for instance when building a CMS app.

It ships three main classes that are detailed in following documentation:

+ [Bgaze\IpsumHtml\IpsumHtml](#bgazeipsumhtmlipsumhtml): creates HTML structures randomly populated with Lorem Ipsum text.
+ [Bgaze\IpsumHtml\Html](#bgazeipsumhtmlhtml): creates HTML structures. They can be manipulated fluently, minified and prettyfied.
+ [Bgaze\IpsumHtml\Ipsum](#bgazeipsumhtmlipsum): generates random Ipsum Ipsum text.

All this classes methods are statics. 

## Installation

Simply install the library using composer:

```
composer require bgaze/ipsum-html
```

## Basic usage

Import the `IpsumHtml` class into your script, then use it statics methods to generate what you need.

```php
use Bgaze\IpsumHtml\IpsumHtml;

// Generate 50 random html blocks then display them prettyfied.
$array = IpsumHtml::random(50);

// Generate a full webpage containing 100 random html blocks and print it prettyfied.
echo IpsumHtml::webpage(100);

// Generate and display a HTML table with 4 colums and 10 rows, then print it minified.
echo IpsumHtml::table(4, 10)->minify();
```

## Bgaze\IpsumHtml\IpsumHtml

This class offers statics methods to create HTML nodes populated with Lorem Ipsum text.
You can manipulate them fluently, and print minified or prettyfied.

Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for most of common HTML content tags.

### Generators

`IpsumHtml` class provides three "generator" methods, that allow to generate randomly a large amount of Lorem Ipsum HTML.

All of these methods accept into the `$tag` argument the list of tags that will be used whan generating HTML content.  
The key is the tag name and the value its weight (probability to appear).

The default tag list is:

```php
[
    'p' => 10, 'ul' => 1, 'ol' => 1, 'dl' => 1,
    'bq' => 1, 'table' => 1, 'code' => 1,
    'img' => 1, 'figure' => 1, 'comment' => 1,
]
```

**random:**

```php
/**
 * Generate randomly an array of Lorem Ipsum HTML nodes.
 * 
 * @param integer $count    The number of nodes to generate
 * @param null|array $tags  An optional array to define the tags to use
 * @return array
 */
public static function random($count, $tags = null)
```

<details>
<summary>See results of <code>echo implode("\n\n", IpsumHtml::random(10));</code></summary>
<p>

```html
<p>
    Quia iste vero accusamus. <sub>Adipisci illum</sub>. Ab neque molestias deserunt distinctio repellat
    voluptas dignissimos mollitia soluta quisquam inventore odit neque ad similique illum doloremque
    illo numquam corporis quisquam illo sunt iusto necessitatibus maiores inventore dicta quaerat
    molestiae soluta recusandae quidem possimus.
</p>

<figure>
    <img src="https://picsum.photos/640/480/?image=475" alt="sit doloremque architecto eius natus similique id voluptatibus"/>
    <figcaption>sit doloremque architecto eius natus similique id voluptatibus</figcaption>
</figure>

<bq>
    Ab eos totam est <b>ab consectetur corporis quos</b>.<br/>
     Sit quia praesentium maiores consectetur ex molestiae illum debitis doloremque odit modi harum
    itaque voluptatibus <em>quia incidunt facilis minus</em> fugit consectetur exercitationem suscipit
    quos dolorem cupiditate cum quisquam sit quae numquam soluta quo saepe doloremque sed culpa saepe.
    Inventore qui id cumque pariatur hic aut sed blanditiis.<br/>
    .
</bq>

<p>
    <sub>Consequuntur veniam in reiciendis</sub> sunt unde impedit eveniet reiciendis <sup>dolores animi
    expedita</sup> aut accusantium enim doloribus.<br/>
     Facilis nulla vero repudiandae asperiores architecto neque ex.
</p>

<dl>
    <dt>Voluptas fuga</dt>
    <dd>Aperiam nihil quas libero assumenda debitis. Ipsa sed id harum.</dd>
    
    <dt>Numquam ullam corporis provident</dt>
    <dd>Quasi labore ipsam provident perspiciatis harum.</dd>
    
    <dt>Consequuntur eius dolore culpa</dt>
    <dd>Labore aliquam vel maxime temporibus necessitatibus repellat. Ut.</dd>
    
    <dt>Consequatur fuga recusandae</dt>
    <dd>Inventore quasi blanditiis natus repellendus illum itaque. Nesciunt.</dd>
</dl>

<p>
    Doloremque amet perspiciatis itaque <a href="#">quos placeat</a> consequatur quae vitae consequuntur
    natus perferendis numquam sint quod temporibus saepe explicabo non aliquid expedita quo earum.
</p>

<img src="https://picsum.photos/640/480/?image=389" alt="amet consectetur aliquid praesentium natus expedita quibusdam illum"/>

<p>
    Magnam enim exercitationem vel officia pariatur nesciunt ipsum eum reprehenderit cupiditate maiores
    quae ad molestiae odio blanditiis repellendus aut numquam natus distinctio <a href="#">beatae
    explicabo fugit ullam</a> aliquid quos cum placeat recusandae voluptatem explicabo quia ipsam iure
    <var>tempora asperiores</var> quia excepturi mollitia harum voluptates repudiandae quasi aspernatur
    nemo ipsam nam temporibus.
</p>

<bq>
    Quasi sint libero quo doloribus aut laboriosam autem deleniti fugiat accusamus <sup>beatae a
    doloribus</sup>.<br/>
     Sed ducimus quas excepturi cupiditate expedita consectetur iusto optio reiciendis odit tempora
    magnam suscipit repudiandae voluptatem dicta corrupti culpa delectus. Eos ratione consectetur quos
    tenetur. Odit sequi eius magnam sunt sed magnam perspiciatis mollitia pariatur ut veniam ex odio
    quas cupiditate <sup>voluptatem corporis esse quo</sup>.
</bq>

<table>
    <thead>
        <tr>
            <th>Modi veniam ipsam omnis</th>
            <th>Dolorem a</th>
            <th>Ab nesciunt neque at</th>
            <th>Alias consequuntur ut veniam</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Inventore enim doloribus</td>
            <td>Consequuntur voluptas earum</td>
            <td>Dicta sint nobis</td>
            <td>Culpa optio</td>
        </tr>
        <tr>
            <td>Voluptatem eveniet doloribus</td>
            <td>Dicta ipsum excepturi id</td>
            <td>Corrupti laborum tempore illum</td>
            <td>Debitis hic</td>
        </tr>
        <tr>
            <td>Laudantium eveniet</td>
            <td>Consequatur neque iusto</td>
            <td>Beatae non voluptatum</td>
            <td>Dicta nam optio</td>
        </tr>
    </tbody>
</table>
```

</p>
</details> 

**document:**

```php
/**
 * Generate randomly an array of Lorem Ipsum HTML nodes hierarchically organised with headers (h1-h6 nodes).
 * 
 * @param integer $count    The number of nodes to generate
 * @param null|array $tags  An optional array to define the tags to use
 * @return array
 */
public static function document($count, $tags = null)
```

<details>
<summary>See results of <code>echo implode("\n\n", IpsumHtml::document(20));</code></summary>
<p>

```html
<h1>Eaque magni ipsum vel iure esse nam cumque. Deleniti.</h1>

<ol>
    <li>Amet deleniti animi libero quod repellat.</li>
    <li>Sit ipsa veritatis voluptate corrupti molestias sapiente voluptatibus.</li>
    <li>Perferendis nesciunt incidunt nihil quidem soluta hic. Dicta.</li>
    <li>Consequatur inventore ratione dolore aliquam iusto error officia libero nulla.</li>
</ol>

<table>
    <thead>
        <tr>
            <th>Ipsa vel voluptate omnis</th>
            <th>Ab impedit pariatur</th>
            <th>Nemo ea molestias</th>
            <th>Aut incidunt enim placeat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Consequatur illo inventore suscipit</td>
            <td>Aperiam nisi at</td>
            <td>Quia laudantium natus</td>
            <td>Nesciunt unde</td>
        </tr>
        <tr>
            <td>Deleniti natus pariatur at</td>
            <td>Eos laudantium</td>
            <td>Voluptatum natus officia fugiat</td>
            <td>Velit nisi cupiditate omnis</td>
        </tr>
        <tr>
            <td>Velit laborum</td>
            <td>Ipsa laboriosam iusto</td>
            <td>Eum quisquam</td>
            <td>Enim dignissimos nulla</td>
        </tr>
        <tr>
            <td>Sint expedita</td>
            <td>Iusto unde laborum doloribus</td>
            <td>Odit tempora</td>
            <td>Ea libero assumenda</td>
        </tr>
    </tbody>
</table>

<h1>Magni ullam voluptate praesentium quo voluptates. Ipsum labore.</h1>

<ul>
    <li>Amet nisi iste culpa distinctio nam. Inventore expedita.</li>
    <li>Ipsa blanditiis unde rerum necessitatibus saepe doloribus. Ad.</li>
    <li>Dicta sunt numquam in voluptatum est quidem earum. Veniam omnis.</li>
    <li>Eaque nisi reprehenderit esse voluptatum deserunt soluta repudiandae. Numquam.</li>
</ul>

<dl>
    <dt>Alias eaque quia nobis</dt>
    <dd>Alias aperiam beatae modi ut voluptate atque. Aperiam optio placeat.</dd>
    
    <dt>Modi magnam quaerat corporis</dt>
    <dd>Veritatis quam error soluta possimus recusandae.</dd>
    
    <dt>Dolorum quibusdam voluptates</dt>
    <dd>Sit sequi ipsum ut corrupti quos possimus.</dd>
    
    <dt>Minima aliquid</dt>
    <dd>Inventore fugit sed dolores modi minus.</dd>
</dl>

<p>
    Doloremque sed libero tempore accusamus quae ab commodi harum vero quia modi laudantium error id vel
    esse cupiditate hic vitae voluptas laboriosam molestias accusamus earum molestiae praesentium optio
    porro incidunt corporis totam occaecati perspiciatis natus sunt voluptate iste id quidem
    voluptatibus <u>ut autem asperiores</u>. Autem voluptate provident facere.
</p>

<pre><code>&lt;img src=&quot;https://picsum.photos/g/640/480/?image=984&quot; alt=&quot;beatae qui quaerat quos sint cum placeat nulla officiis repellat&quot;/&gt;

&lt;ul&gt;
 &lt;li&gt;Odit dolor totam est eligendi minus temporibus maiores. Consectetur.&lt;/li&gt;
 &lt;li&gt;Perferendis sit iusto rem quos molestias.&lt;/li&gt;
 &lt;li&gt;Architecto sequi dolorem tempora nisi eum in quidem nam illum.&lt;/li&gt;
&lt;/ul&gt;

&lt;bq&gt;
 Aspernatur excepturi deserunt fuga sit doloremque odio natus tenetur sapiente explicabo eius
 occaecati quisquam recusandae illo et cupiditate impedit sit eos est assumenda repellat
 &lt;small&gt;aperiam quae laudantium placeat&lt;/small&gt; deleniti quas rerum porro doloribus architecto vitae
 omnis expedita recusandae. Sunt aspernatur iure eveniet perferendis voluptatem commodi iste eos
 adipisci vel eveniet.
&lt;/bq&gt;</code></pre>

<p>
    Eius in mollitia at ab inventore numquam aliquid a. Aut voluptatem tempore illum modi nisi ea
    voluptatum quisquam voluptates quia eos ipsum occaecati accusamus hic quasi consectetur dolore nisi
    quaerat blanditiis unde impedit minus aliquid commodi voluptate iste quidem suscipit vel est
    pariatur voluptates beatae explicabo corporis facilis doloribus. Ullam ducimus excepturi laborum
    voluptatibus sequi adipisci quis laborum itaque doloribus.<br/>
     Architecto veniam quam harum vero. Enim voluptates asperiores.
</p>

<ol>
    <li>Voluptatem dicta tempora laboriosam nihil quos unde quisquam necessitatibus. Tempore.</li>
    <li>Inventore natus culpa fuga porro sapiente. Sed.</li>
    <li>Aut accusantium beatae velit reprehenderit molestias id fuga asperiores. Exercitationem.</li>
    <li>Sit eos natus dolorum repellendus voluptatibus. Tempore.</li>
</ol>

<h1>In rem cupiditate quo quod delectus.</h1>

<bq>
    Incidunt quaerat laboriosam dignissimos quas <strong>consectetur velit temporibus accusamus</strong>
    ad iusto accusamus debitis dolores numquam quam temporibus. <abbr>Libero officiis</abbr>. Odit
    reprehenderit deleniti eligendi at. Eius ut praesentium omnis iste <a href="#">tempora quam
    odio</a>.
</bq>

<h2>Aspernatur ipsum non labore soluta fugiat. Eos tempora.</h2>

<bq>
    Neque cupiditate iste libero illum fugiat dolores quaerat praesentium mollitia sed nostrum ducimus
    placeat nulla <em>at earum maiores</em> quae labore reprehenderit odio maxime. <u>Iusto accusamus a
    maiores</u>.
</bq>

<ul>
    <li>Nesciunt neque adipisci assumenda illum pariatur asperiores.</li>
    <li>Voluptas totam sint perspiciatis nobis maiores.</li>
    <li>Doloremque ex iusto perspiciatis fuga fugiat.</li>
    <li>Eos qui aliquam iste possimus recusandae. Quam iusto culpa expedita.</li>
</ul>

<h3>Voluptatem quae eum molestiae corrupti natus. Quidem placeat repellendus.</h3>

<p>
    <em>Dolorem amet commodi</em> alias nostrum quo at accusamus doloribus <em>ipsa velit</em> esse
    culpa facere assumenda repellendus perferendis vitae ducimus tempore sunt aspernatur quaerat esse
    sint a et nostrum assumenda debitis earum quaerat rem est optio quisquam voluptatem iusto corrupti
    deserunt voluptates voluptatibus commodi in culpa repudiandae recusandae vitae exercitationem
    laborum expedita a corporis quam soluta.
</p>

<h3>Voluptatem inventore beatae dolorem iusto saepe.</h3>

<p>
    Qui dolor enim ullam corporis quibusdam. Explicabo minima perspiciatis impedit saepe voluptatem
    accusantium velit nisi nihil.
</p>

<ol>
    <li>Neque tempora corporis odio libero assumenda.</li>
    <li>Modi quaerat occaecati laborum quibusdam necessitatibus. Quis eum.</li>
</ol>
```

</p>
</details> 

**webpage:**

```php
/**
* Generate a complete Lorem Ipsum webpage, hierarchically organised with headers (h1-h6 nodes).
* 
* @param integer $count    The number of nodes to generate
* @param null|array $tags  An optional array to define the tags to use
* @param string $lang      The lang attribute of the "html" node.
* @return Bgaze\IpsumHtml\Nodes\Node
*/
public static function webpage($count, $tags = null, $lang = 'en')
```

<details>
<summary>See results of <code>echo IpsumHtml::webpage(10);</code></summary>
<p>

```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Perferendis nulla</title>
    </head>
    <body>
        <h1>Ipsa ab sunt fugit quia esse at. Aut.</h1>
        
        <ol>
            <li>Eos incidunt aliquam minima corporis id laborum optio.</li>
            <li>Dolor consectetur commodi unde eligendi tenetur maiores. Exercitationem.</li>
            <li>Eaque consectetur in iusto excepturi saepe. Molestias.</li>
        </ol>
        
        <h2>Accusantium magnam minima rem voluptatum sint.</h2>
        
        <figure>
            <img src="https://picsum.photos/640/480/?image=140" alt="sunt consequuntur reprehenderit iusto expedita facere"/>
            <figcaption>sunt consequuntur reprehenderit iusto expedita facere</figcaption>
        </figure>
        
        <table>
            <thead>
                <tr>
                    <th>Ex accusamus</th>
                    <th>Nisi quisquam</th>
                    <th>Iusto saepe voluptates</th>
                    <th>Eius animi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Aut occaecati soluta repellendus</td>
                    <td>Alias provident</td>
                    <td>Sit fugit maxime temporibus</td>
                    <td>Dicta id rerum a</td>
                </tr>
                <tr>
                    <td>Amet provident</td>
                    <td>Magni culpa tempore</td>
                    <td>Accusantium aspernatur eligendi</td>
                    <td>Dolores exercitationem possimus</td>
                </tr>
                <tr>
                    <td>Quaerat laudantium cum repellendus</td>
                    <td>Id expedita repellendus</td>
                    <td>Perferendis ut totam</td>
                    <td>Labore laboriosam tempore impedit</td>
                </tr>
            </tbody>
        </table>
        
        <figure>
            <img src="https://picsum.photos/g/640/480/?image=981" alt="dolor ullam aliquid tempore repudiandae itaque doloribus"/>
            <figcaption>dolor ullam aliquid tempore repudiandae itaque doloribus</figcaption>
        </figure>
        
        <h1>Consequatur dolorem amet corporis autem dolorum. Consequatur recusandae.</h1>
        
        <ul>
            <li>Dolores blanditiis dolorum expedita at accusamus voluptatibus.</li>
            <li>Eaque magni ad error quibusdam illum. Aspernatur ipsum minus.</li>
            <li>Sit sequi tempora corporis voluptate provident laborum placeat.</li>
            <li>Voluptate quam nobis repudiandae hic reiciendis. Tempora officia.</li>
        </ul>
        
        <p>
            Consectetur magnam rem accusamus sunt suscipit quos est <sub>voluptates asperiores</sub> veritatis
            sunt modi nemo dignissimos iste quis vel unde quo possimus pariatur. Sit.
        </p>
        
        <dl>
            <dt>Eos voluptas</dt>
            <dd>Aspernatur quia velit non dignissimos iste maxime possimus.</dd>
            
            <dt>Atque assumenda voluptatibus</dt>
            <dd>Ea iste fuga optio officiis asperiores. Enim exercitationem nulla repellat.</dd>
            
            <dt>Totam excepturi libero illum</dt>
            <dd>Sunt amet veniam occaecati quidem voluptates asperiores. Aliquam ipsam.</dd>
        </dl>
    </body>
</html>
```

</p>
</details> 

### Complexe HTML structures

IpsumHtml also provide helpers to generate common complex HTML structures:

**dl:**

```php
/**
 * Generate a Lorem Ipsum "dl" node.
 * 
 * @param null|integer $count       The number of dt/dd pairs it contains (2-4 if null)
 * @param null|integer $dtWords     The number of words into dt elements (2-4 if null)
 * @param null|integer $ddWords     The number of words into dd elements (6-10 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function dl($count = null, $dtWords = null, $ddWords = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::dl();</code></summary>
<p>

```html
<dl>
    <dt>Dolores non voluptatum</dt>
    <dd>Illo sequi dignissimos quos quo sapiente. Asperiores.</dd>
    
    <dt>Ut laboriosam</dt>
    <dd>Consectetur ut nostrum natus est possimus accusamus. Non.</dd>
    
    <dt>Odit corporis tenetur asperiores</dt>
    <dd>Magni voluptas voluptate molestiae officia impedit.</dd>
    
    <dt>Magnam ex occaecati accusamus</dt>
    <dd>Labore minima commodi iusto placeat accusamus delectus. Id.</dd>
</dl>
```

</p>
</details> 

**ul:**

```php
/**
 * Generate a Lorem Ipsum "ul" node.
 * 
 * @param null|integer $count   The number of items it contains (2-4 if null)
 * @param null|integer $words   The number of words into items (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function ul($count = null, $words = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::ul();</code></summary>
<p>

```html
<ul>
    <li>Voluptatem numquam exercitationem molestias harum quod sapiente. Voluptatem explicabo.</li>
    <li>Ratione dolorem nisi reprehenderit praesentium harum maxime.</li>
    <li>Voluptatem et blanditiis cum cumque quibusdam at.</li>
    <li>Ratione consectetur modi quis nam vero saepe. Rerum.</li>
</ul>
```

</p>
</details> 

**ol:**

```php
/**
 * Generate a Lorem Ipsum "ol" node.
 * 
 * @param null|integer $count   The number of items it contains (2-4 if null)
 * @param null|integer $words   The number of words into items (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function ol($count = null, $words = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::ol();</code></summary>
<p>

```html
<ol>
    <li>Sed dolores nostrum eum quos officiis. Doloremque tempora quo repellendus.</li>
    <li>Consequatur explicabo similique optio temporibus voluptates. Ipsa ab.</li>
    <li>Veritatis tempora enim provident expedita quo recusandae. Iure molestiae.</li>
</ol>
```

</p>
</details> 

**tr:**

```php
/**
 * Generate a Lorem Ipsum "tr" node.
 * 
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param boolean $th           Use "th" for cells instead of "td"?
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tr($cols = null, $th = false, $words = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::tr();</code></summary>
<p>

```html
<tr>
    <td>Quia qui ea esse</td>
    <td>Quae magnam deserunt doloribus</td>
    <td>Quos officia</td>
    <td>Quaerat nihil cum</td>
    <td>Sunt atque quidem quisquam</td>
</tr>
```

</p>
</details> 

**thead:**

```php
/**
 * Generate a Lorem Ipsum "thead" node containing a heading row.
 * 
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function thead($cols = null, $words = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::thead();</code></summary>
<p>

```html
<thead>
    <tr>
        <th>Voluptatem illo repudiandae</th>
        <th>Impedit nulla</th>
        <th>Beatae sunt dignissimos</th>
        <th>Ex voluptatum fuga</th>
    </tr>
</thead>
```

</p>
</details> 

**tbody:**

```php
/**
 * Generate a Lorem Ipsum "tbody" node containing several rows.
 * 
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param null|integer $rows    The number of rows (4-10 if null)
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tbody($cols = null, $rows = null, $words = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::tbody();</code></summary>
<p>

```html
<tbody>
    <tr>
        <td>Accusantium eos eveniet</td>
        <td>Numquam nemo tempore</td>
        <td>Blanditiis deleniti iste</td>
        <td>Illo suscipit</td>
    </tr>
    <tr>
        <td>Aliquid in est</td>
        <td>Tempora quam cum voluptates</td>
        <td>Dignissimos perspiciatis fuga libero</td>
        <td>Nesciunt quam</td>
    </tr>
    <tr>
        <td>Incidunt quod</td>
        <td>Sequi minus</td>
        <td>In quo facere</td>
        <td>Vel cum</td>
    </tr>
</tbody>
```

</p>
</details> 

**table:**

```php
/**
 * Generate a Lorem Ipsum "table" node with header and content.
 * 
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param null|integer $rows    The number of rows (4-10 if null)
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function table($cols = null, $rows = null, $words = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::table();</code></summary>
<p>

```html
<table>
    <thead>
        <tr>
            <th>Fugit harum</th>
            <th>Quae dolore</th>
            <th>Ab exercitationem reprehenderit necessitatibus</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Quasi dicta odio</td>
            <td>Velit veniam error nulla</td>
            <td>Consequuntur laboriosam harum quibusdam</td>
        </tr>
        <tr>
            <td>Nemo molestiae</td>
            <td>Veritatis incidunt natus sapiente</td>
            <td>Dicta quos</td>
        </tr>
        <tr>
            <td>Illo animi id</td>
            <td>Odit quisquam</td>
            <td>Magni dolorum asperiores</td>
        </tr>
    </tbody>
</table>
```

</p>
</details> 

**img:**

```php
/**
 * Generate a Lorem Ipsum "img" node thanks to https://picsum.photos/
 * 
 * @param integer $width            The width of the image in pixels
 * @param integer $height           The height of the image in pixels
 * @param null|boolean $grayscale   Get a grayscale image (random if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function img($width = 640, $height = 480, $grayscale = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::img();</code></summary>
<p>

```html
<img src="https://picsum.photos/640/480/?image=467" alt="sequi tempora nisi iusto animi fuga porro"/>
```

</p>
</details> 

**figure:**

```php
/**
 * Generate a Lorem Ipsum "figure" node thanks to https://picsum.photos/
 * 
 * @param integer $width            The width of the image in pixels
 * @param integer $height           The height of the image in pixels
 * @param null|boolean $grayscale   Get a grayscale image (random if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function figure($width = 640, $height = 480, $grayscale = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::figure();</code></summary>
<p>

```html
<figure>
    <img src="https://picsum.photos/640/480/?image=386" alt="explicabo aspernatur incidunt suscipit nulla earum sapiente"/>
    <figcaption>explicabo aspernatur incidunt suscipit nulla earum sapiente</figcaption>
</figure>
```

</p>
</details> 

**code:**

```php
/**
 * Generate a Lorem Ipsum code block ("pre > code").
 * 
 * @param null|integer $count   The number of code samples into d=the block (1-3 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function code($count = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::code();</code></summary>
<p>

```html
<pre><code>&lt;bq&gt;
 &lt;u&gt;Doloremque molestiae totam&lt;/u&gt; qui amet nisi expedita at. Velit minima rem deleniti
 deserunt.&lt;br/&gt;
 Explicabo qui ratione suscipit assumenda tempora laudantium occaecati rerum fugiat earum doloremque
 incidunt ex esse rem occaecati vitae adipisci in fuga a dolores dolorem consectetur quis libero quo
 doloremque deleniti quas harum cum facere numquam ullam perspiciatis omnis quo nulla &lt;b&gt;dicta dolor
 reprehenderit debitis&lt;/b&gt;. Consectetur suscipit quos nobis repudiandae harum repudiandae.
&lt;/bq&gt;</code></pre>
```

</p>
</details> 

**comment:**

```php
/**
 * Generate a Lorem Ipsum "comment" node.
 * 
 * @param boolean $inline   Is the comment an inline comment (random if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function comment($inline = null)
```

<details>
<summary>See results of <code>echo IpsumHtml::comment();</code></summary>
<p>

```html
<!--
    alias ab et dicta sunt fugit quia numquam dolore aliquam veniam corporis voluptate iusto blanditiis
    totam natus error similique deserunt dolorum expedita nam tempore porro quod assumenda quibusdam
    saepe eveniet
    
    <figure>
        <img src="https://picsum.photos/640/480/?image=131" alt="sequi suscipit rem sint fuga temporibus officiis"/>
        <figcaption>sequi suscipit rem sint fuga temporibus officiis</figcaption>
    </figure>
    
    ab veritatis vitae dicta sequi adipisci non quaerat ad veniam voluptas vel reprehenderit molestiae
    iusto corrupti occaecati cupiditate mollitia libero repellendus hic
-->
```

</p>
</details> 

## Bgaze\IpsumHtml\Html

This class offers statics methods to create HTML nodes that you can manipulate fluently, and print minified or prettyfied.  
The node `__toString` method is an alias to the `prettify` method.  

There are three types of nodes, handled by a dedicated class:

+ **Bgaze\IpsumHtml\Nodes\PlainText**  
PlainText node has no attributes, content is a string.  
Any element added to a node that is not ans instance of a node class will be turned into a PlainText node.  
+ **Bgaze\IpsumHtml\Nodes\Comment**  
Comment node has no attributes, content is an array of nodes.
+ **Bgaze\IpsumHtml\Nodes\Node**  
Node instance has attributes, content is an array of nodes except for void elements (self closing tags) that have no content.  
Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for all non obsoletes and non experimentals tags listed on [https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5](https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5)

### Bgaze\IpsumHtml\Nodes\PlainText

PlainText node has no attributes, content is a string.  
Any element added to a node that is not ans instance of a node class will be turned into a PlainText node.

You can create PlainTexts node with the `Html::txt` method:

```php
$txt = Html::txt('Ab illo aspernatur magnam cum at.')->append(' Sunt consequuntur numquam nisi reprehenderit distinctio fugiat aspernatur magnam cum at.');

echo $txt->minify();
echo "\n\n";
echo $txt;
echo "\n\n";
echo $txt->prettify(1, 2, 50);

/*
Ab illo aspernatur magnam cum at. Sunt consequuntur numquam nisi reprehenderit distinctio fugiat aspernatur magnam cum at.

Ab illo aspernatur magnam cum at.Sunt consequuntur numquam nisi reprehenderit distinctio fugiat
aspernatur magnam cum at.

  Ab illo aspernatur magnam cum at. Sunt
  consequuntur numquam nisi reprehenderit distinctio
  fugiat aspernatur magnam cum at.
*/
```

### Bgaze\IpsumHtml\Nodes\Comment

Comment node has no attributes, content is an array of nodes.

You can create a Comment node with the `Html::comment` method:

```php
$comment = Html::comment('Ab illo aspernatur magnam cum at.')
        ->append(Html::p('Sunt consequuntur numquam nisi reprehenderit'))
        ->append('Distinctio fugiat aspernatur magnam cum at.');

echo $comment->minify();
echo "\n\n";
echo $comment;
echo "\n\n";
echo $comment->prettify(1, 2, 50);

/*
<!-- Ab illo aspernatur magnam cum at.<p>Sunt consequuntur numquam nisi reprehenderit</p>Distinctio fugiat aspernatur magnam cum at. -->

<!--
    Ab illo aspernatur magnam cum at.
    <p>
        Sunt consequuntur numquam nisi reprehenderit
    </p>
    Distinctio fugiat aspernatur magnam cum at.
-->

  <!--
    Ab illo aspernatur magnam cum at.
    <p>
      Sunt consequuntur numquam nisi reprehenderit
    </p>
    Distinctio fugiat aspernatur magnam cum at.
  -->
 */
```

### Bgaze\IpsumHtml\Nodes\Node

Node instance has attributes, content is an array of nodes except for void elements (self closing tags) that have no content.

Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for all non obsoletes and non experimentals tags listed on [https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5](https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5)

There is two types of methods which signature is different:

+ **Void elements:** `Html::tagName(array $attributes = [])`  
Void elements are: area, base, br, col, embed, hr, img, input, link, meta, param, source, track, wbr.
+ **Other elements:** `Html::tagName($content = null, array $attributes = [])`  
The `$content` can be a string, a node or an array of strings and nodes.

```php
$node = Html::ul([
    Html::li('One')->setAttribute('class', 'one'),
    Html::li('Two')->setAttribute('class', 'two'),
    Html::li('Three')->setAttribute('class', 'three'),
], ['id' => 'ul', 'class' => 'ul']);

echo $node->minify();
echo "\n\n";
echo $node;
echo "\n\n";
echo $node->prettify(1, 2, 50);

/*
<ul id="ul" class="ul"><li class="one">One</li><li class="two">Two</li><li class="three">Three</li></ul>

<ul id="ul" class="ul">
    <li class="one">One</li>
    <li class="two">Two</li>
    <li class="three">Three</li>
</ul>

  <ul id="ul" class="ul">
    <li class="one">One</li>
    <li class="two">Two</li>
    <li class="three">Three</li>
  </ul>
*/
```

```php
$node = Html::input(['id' => 'input', 'type' => 'text']);
echo $node->minify();
echo "\n\n";
echo $node;
echo "\n\n";
echo $node->prettify(1, 2, 50);

/*
<input id="input" type="text"/>

<input id="input" type="text"/>

  <input id="input" type="text"/>
*/
```

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


