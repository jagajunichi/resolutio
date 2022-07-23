Object
サイト全体における、繰り返されるビジュアルパターンをすべてObjectと定義。

- Component
再利用できるパターンとして、小さな単位のモジュールを定義。
※marginなど余白は定義しない。あくまでパーツとして扱う

c-button.scss
c-grid.scss
c-input.scss
…

- Project
いくつかのComponentと、それに該当しない要素によって構成されるものを管理。

つまり、

小さい単位のComponentを集めて、一つのObjectとして扱いたい時
Componentとするには大きすぎるObjectとなる時
にProjectとして定義する。


- Utility
u-margin.scss
u-color.scss
u-fontsize.scss
u-clearfix.scss
...

Component、ProjectのObjectを無駄に増やしてしまうことを防せぐ。
Object自体が持つべきではないmarginの代わりに.u-mb10 { margin-bottom: 10px; }のような隣接するモジュールとの間隔をつくるといった役割。

すべての余白marginをUtilityクラスでつけることはしない。
あくまで補助としての役割であること。

Projectとして定義するには要素が少なすぎる場合やcomponent単体で使うときに使用