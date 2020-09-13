  <?php
    // カスタム投稿タイプを作成
    function create_post_type(){
      $exampleSupports = [
        'title', // 記事タイトル
        'editor', // 記事本文
        'auther', // 執筆者名
        'excerpt', // 抜粋?
        'custom-fields', // カスタムフィールド
        'thumbnail', // アイキャッチ
        'revisions', // リビジョン
        'comments', // コメント
      ];
      register_post_type('post_recipe', //カスタム投稿名
        array(
          'label' => 'レシピ投稿', // admin画面左メニューで表示されるテキスト
          'public' => true, // 投稿タイプをパブリックにするか否か
          'has_archive' => true, // アーカイブを有効にするか否か
          'menu_position' => 5, // 管理画面上でどこに配置するか。今回の場合は「投稿」の下に配置
          'supports' => $exampleSupports, // 投稿画面でどのモジュールを使うか
        )
      );
      // タクソノミー(カテゴリ)追加
      register_taxonomy(
        'post_taxonomy', // 追加するタクソノミー名（英小文字とアンダースコアのみ）
        'post_recipe',  // どのカスタム投稿タイプに追加するか
        array(
          'update_count_callback' => '_update_post_term_count', // 各タクソノミーの管理画面でターム一覧に表示される投稿数を正しい値にするのに必要
          'label' => 'レシピ投稿テストタクソノミー', // 管理画面に表示される名前(投稿でいうカテゴリー)
          'labels' => array(
            'all_items' => 'レシピ投稿タクソノミー一覧',  // 投稿画面の右カラムに表示されるテキスト(投稿でいうカテゴリー一覧)
            'add_new_item' => '新規レシピ投稿タクソノミーを追加'  // 投稿画面の右カラムに表示されるカテゴリ追加リンク
          ),
          'hierarchical' => false,  // タクソノミーを階層化できるか否か(子カテゴリーを作れるかどうか)
          'show_ui' => true // オフで管理画面で非表示。編集も不能に
        )
      );
      // タクソノミー(タグ)追加
      register_taxonomy(
        'post_tag', // 追加するタクソノミー名（英小文字とアンダースコアのみ）
        'post_recipe',  // どのカスタム投稿タイプに追加するか
        array(
          'update_count_callback' => '_update_post_term_count', // 各タクソノミーの管理画面でターム一覧に表示される投稿数を正しい値にするのに必要
          'label' => 'レシピ投稿タクソノミー', // 管理画面に表示される名前(投稿でいうカテゴリー)
          'labels' => array(
            'all_items' => 'レシピ投稿タクソノミー一覧',  // 投稿画面の右カラムに表示されるテキスト(投稿でいうカテゴリー一覧)
            'add_new_item' => '新規レシピ投稿タクソノミーを追加'  // 投稿画面の右カラムに表示されるカテゴリ追加リンク
          ),
          'hierarchical' => true,  // タクソノミーを階層化できるか否か(タグの場合作る必要がないのでfalseを)
          'show_ui' => true // オフで管理画面で非表示。編集も不能に
        )
      );
    }
    add_action('init','create_post_type'); // アクションに上記関数をフック。
    // カスタム投稿タイプを複数作った場合 'create_post_type' の位置に関数名を配列で置くと一行で済む。
    // ex) array('exampleSupports','exampleSupports2',…)
; ?>
