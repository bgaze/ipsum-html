# Bgaze\IpsumHtml\IpsumHtml

This class offers statics methods to create HTML nodes populated with Lorem Ipsum text.  
You can manipulate them fluently, and print minified or prettyfied.

## Generators

`IpsumHtml` class provides three "generator" methods, that allow to generate randomly a large amount of Lorem Ipsum HTML.

All of these methods accept as `$tag` argument an array of tags to use when generating HTML content.  
The key is the **tag name** and the value its **weight** (probability to appear).

The default tag list is:

```php
[
    'p' => 10, 'ul' => 1, 'ol' => 1, 'dl' => 1,
    'bq' => 1, 'table' => 1, 'code' => 1,
    'img' => 1, 'figure' => 1, 'comment' => 1,
]
```

### IpsumHtml::random

Generates randomly an array of Lorem Ipsum HTML nodes.

```php
/**
 * @param integer $count    The number of nodes to generate
 * @param null|array $tags  An optional array to define the tags to use
 * @return array
 */
public static function random($count, $tags = null)
```

<details><summary>Example: <code>echo implode("\n\n", IpsumHtml::random(10));</code></summary><p>

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

</p></details> 

### IpsumHtml::document

Generate randomly an array of Lorem Ipsum HTML nodes hierarchically organised with headers (h1-h6 nodes).
```php
/**
 * @param integer $count    The number of nodes to generate
 * @param null|array $tags  An optional array to define the tags to use
 * @return array
 */
public static function document($count, $tags = null)
```

<details><summary>Example: <code>echo implode("\n\n", IpsumHtml::document(20));</code></summary><p>

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

</p></details> 

### IpsumHtml::webpage

Generate a complete Lorem Ipsum webpage, hierarchically organised with headers (h1-h6 nodes).

```php
/**
* @param integer $count    The number of nodes to generate
* @param null|array $tags  An optional array to define the tags to use
* @param string $lang      The lang attribute of the "html" node.
* @return Bgaze\IpsumHtml\Nodes\Node
*/
public static function webpage($count, $tags = null, $lang = 'en')
```

<details><summary>Example: <code>echo IpsumHtml::webpage(10);</code></summary><p>

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

</p></details> 

## Complex HTML structures

IpsumHtml also provide helpers to generate common complex HTML structures:

### IpsumHtml::dl

Generate a Lorem Ipsum "dl" node.

```php
/**
 * @param null|integer $count       The number of dt/dd pairs it contains (2-4 if null)
 * @param null|integer $dtWords     The number of words into dt elements (2-4 if null)
 * @param null|integer $ddWords     The number of words into dd elements (6-10 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function dl($count = null, $dtWords = null, $ddWords = null)
```

<details><summary>Example: <code>echo IpsumHtml::dl();</code></summary><p>

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

</p></details> 

### IpsumHtml::ul

Generate a Lorem Ipsum "ul" node.

```php
/**
 * @param null|integer $count   The number of items it contains (2-4 if null)
 * @param null|integer $words   The number of words into items (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function ul($count = null, $words = null)
```

<details><summary>Example: <code>echo IpsumHtml::ul();</code></summary><p>

```html
<ul>
    <li>Voluptatem numquam exercitationem molestias harum quod sapiente. Voluptatem explicabo.</li>
    <li>Ratione dolorem nisi reprehenderit praesentium harum maxime.</li>
    <li>Voluptatem et blanditiis cum cumque quibusdam at.</li>
    <li>Ratione consectetur modi quis nam vero saepe. Rerum.</li>
</ul>
```

</p></details> 

### IpsumHtml::ol

Generate a Lorem Ipsum "ol" node.

```php
/**
 * @param null|integer $count   The number of items it contains (2-4 if null)
 * @param null|integer $words   The number of words into items (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function ol($count = null, $words = null)
```

<details><summary>Example: <code>echo IpsumHtml::ol();</code></summary><p>

```html
<ol>
    <li>Sed dolores nostrum eum quos officiis. Doloremque tempora quo repellendus.</li>
    <li>Consequatur explicabo similique optio temporibus voluptates. Ipsa ab.</li>
    <li>Veritatis tempora enim provident expedita quo recusandae. Iure molestiae.</li>
</ol>
```

</p></details> 

### IpsumHtml::tr

Generate a Lorem Ipsum "tr" node.

```php
/**
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param boolean $th           Use "th" for cells instead of "td"?
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tr($cols = null, $th = false, $words = null)
```

<details><summary>Example: <code>echo IpsumHtml::tr();</code></summary><p>

```html
<tr>
    <td>Quia qui ea esse</td>
    <td>Quae magnam deserunt doloribus</td>
    <td>Quos officia</td>
    <td>Quaerat nihil cum</td>
    <td>Sunt atque quidem quisquam</td>
</tr>
```

</p></details> 

### IpsumHtml::thead

Generate a Lorem Ipsum "thead" node containing a heading row.

```php
/**
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function thead($cols = null, $words = null)
```

<details><summary>Example: <code>echo IpsumHtml::thead();</code></summary><p>

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

</p></details> 

### IpsumHtml::tbody

Generate a Lorem Ipsum "tbody" node containing several rows.

```php
/**
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param null|integer $rows    The number of rows (4-10 if null)
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tbody($cols = null, $rows = null, $words = null)
```

<details><summary>Example: <code>echo IpsumHtml::tbody();</code></summary><p>

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

</p></details> 

### IpsumHtml::table

Generate a Lorem Ipsum "table" node with header and content.

```php
/**
 * @param null|integer $cols    The number of columns (3-5 if null)
 * @param null|integer $rows    The number of rows (4-10 if null)
 * @param null|integer $words   The number of words into cells (2-4 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function table($cols = null, $rows = null, $words = null)
```

<details><summary>Example: <code>echo IpsumHtml::table();</code></summary><p>

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

</p></details> 

### IpsumHtml::img

Generate a Lorem Ipsum "img" node thanks to [https://picsum.photos/]()

```php
/**
 * @param integer $width            The width of the image in pixels
 * @param integer $height           The height of the image in pixels
 * @param null|boolean $grayscale   Get a grayscale image (random if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function img($width = 640, $height = 480, $grayscale = null)
```

<details><summary>Example: <code>echo IpsumHtml::img();</code></summary><p>

```html
<img src="https://picsum.photos/640/480/?image=467" alt="sequi tempora nisi iusto animi fuga porro"/>
```

</p></details> 

### IpsumHtml::figure

Generate a Lorem Ipsum "figure" node thanks to [https://picsum.photos/]()

```php
/**
 * @param integer $width            The width of the image in pixels
 * @param integer $height           The height of the image in pixels
 * @param null|boolean $grayscale   Get a grayscale image (random if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function figure($width = 640, $height = 480, $grayscale = null)
```

<details><summary>Example: <code>echo IpsumHtml::figure();</code></summary><p>

```html
<figure>
    <img src="https://picsum.photos/640/480/?image=386" alt="explicabo aspernatur incidunt suscipit nulla earum sapiente"/>
    <figcaption>explicabo aspernatur incidunt suscipit nulla earum sapiente</figcaption>
</figure>
```

</p></details> 

### IpsumHtml::code

Generate a Lorem Ipsum code block ("pre > code").

```php
/**
 * @param null|integer $count   The number of code samples into d=the block (1-3 if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function code($count = null)
```

<details><summary>Example: <code>echo IpsumHtml::code();</code></summary><p>

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

</p></details> 

### IpsumHtml::comment

Generate a Lorem Ipsum "comment" node.

```php
/**
 * @param boolean $inline   Is the comment an inline comment (random if null)
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function comment($inline = null)
```

<details><summary>Example: <code>echo IpsumHtml::comment();</code></summary><p>

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

</p></details> 

## Magically defined methods

Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.

Completion is provided for most of common HTML content tags.  
Any undefined tag will be considered as a "large text element".

### 1 word elements

Apply to following tags: **var**, **abbr**, **sub**, **sup**.

Method signature is :

```php
/**
 * @param integer $words    The number of words into the node text
 * @param boolean $ucfirst  The node text begins with an uppercased letter
 * @param boolean $dot      The node text ends witch a dot
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tagName($words = 1, $ucfirst = false, boolean $dot = false)
```

### Lowercased small text elements

Apply to following tags: **a**, **em**, **strong**, **small**, **s**, **q**, **i**, **b**, **u**, **mark**, **span**.

Method signature is :

```php
/**
 * @param integer $words    The number of words into the node text [null => 2-4 words]
 * @param boolean $ucfirst  The node text begins with an uppercased letter
 * @param boolean $dot      The node text ends witch a dot
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tagName($words = null, $ucfirst = false, boolean $dot = false)
```

### Capitalized small text elements

Apply to following tags: **title**, **dt**, **caption**, **td**, **th**, **legend**, **label**.

Method signature is :

```php
/**
 * @param integer $words    The number of words into the node text [null => 2-4 words]
 * @param boolean $ucfirst  The node text begins with an uppercased letter
 * @param boolean $dot      The node text ends witch a dot
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tagName($words = null, $ucfirst = true, boolean $dot = false)
```

### Medium text elements

Apply to following tags: **h1**, **h2**, **h3**, **h4**, **h5**, **h6**, **li**, **dd**, **figcaption**, **cite**, **dfn**, **samp**.

Method signature is :

```php
/**
 * @param integer $words        The number of words into the node text [null => 6-10 words]
 * @param array|bool $decorate  Decorate the node text with inline HTML tags
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tagName($words = null, $decorate = false)
```

### Large text elements

Apply to any tag not listed before will be considered as a "large text element".  
Completion is provided for following tags : **p**, **bq**.

Method signature is :

```php
/**
 * @param integer $words        The number of words into the node text [null => 15-80 words]
 * @param array|bool $decorate  Decorate the node text with inline HTML tags
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tagName($words = null, $decorate = true)
```
