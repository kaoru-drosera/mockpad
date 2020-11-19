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
      register_post_type('article', //カスタム投稿名
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
        'article',  // どのカスタム投稿タイプに追加するか
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
        'article',  // どのカスタム投稿タイプに追加するか
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




    // カスタム投稿タイプを作成
    function create_post_type2(){
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
      register_post_type('article2', //カスタム投稿名
        array(
          'label' => 'テスト投稿タイプ', // admin画面左メニューで表示されるテキスト
          'public' => true, // 投稿タイプをパブリックにするか否か
          'has_archive' => true, // アーカイブを有効にするか否か
          'menu_position' => 5, // 管理画面上でどこに配置するか。今回の場合は「投稿」の下に配置
          'supports' => $exampleSupports, // 投稿画面でどのモジュールを使うか
        )
      );
      // タクソノミー(カテゴリ)追加
      register_taxonomy(
        'post_taxonomy', // 追加するタクソノミー名（英小文字とアンダースコアのみ）
        'article2',  // どのカスタム投稿タイプに追加するか
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
        'article2',  // どのカスタム投稿タイプに追加するか
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
    add_action('init','create_post_type2'); // アクションに上記関数をフック。
    // カスタム投稿タイプを複数作った場合 'create_post_type' の位置に関数名を配列で置くと一行で済む。
    // ex) array('exampleSupports','exampleSupports2',…)

    function get_user_favorite_post_ids($user_ID) {
        global $wpdb;
        $results = $wpdb->get_results($wpdb->prepare("SELECT post_id FROM wp_ulike WHERE status = 'like' AND user_id = %d;", $user_ID));
        $post_ids = null;
        foreach ($results as $result) {
          $post_ids[] = $result->post_id;
        }
        return $post_ids;
    }
     // https://cree.fun/4031/



     function my_top_rank_liked($user_ID){
         global $wpdb;
         $likers = $wpdb->get_results(("SELECT post_id, count(post_id) FROM wp_ulike WHERE status = 'like' GROUP BY post_id ORDER BY count(post_id) DESC"));

             $post_ids2 = null;
             foreach ($likers as $liker) {
               $post_ids2[] = $liker->post_id;
             }
             return $post_ids2;
     }
      // https://nkmrkisk.com/archives/1616


     add_theme_support('menus');

     // ウィジット
       register_sidebar(array(
         'name' => 'いいねランキング by ulike',
         'description' => 'いいねランキング',
         'id' => 'ulikebar',
         'before_widget' => '<div>',
     		 'after_widget' => '</div>',
     		 'before_title' => '<h2 class="rounded">',
     		 'after_title' => '</h2>',
       ));

       function my_show_admin_bar($content){
         if(current_user_can('administrator')){
           return $content;
         } else {
           return false;
         }
       }
       add_filter('show_admin_bar','my_show_admin_bar');


       /* search.phpで検索する範囲を「特定のカスタムフィールド」に限定する */
       // function custom_search($search, $wp_query) {
       // 	global $wpdb;
       //
       // 	if (!$wp_query->is_search) return $search;
       // 	if (!isset($wp_query->query_vars)) return $search;
       //
       // 	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
       // 	if ( count($search_words) > 0 ) {
       // 		$search = '';
       // 		$search .= "AND post_type = 'article'";
       // 		foreach ( $search_words as $word ) {
       // 			if ( !empty($word) ) {
       // 				$search_word = '%'.esc_sql( $word ).'%';
       // 				$search .= " AND (
       //          {$wpdb->posts}.post_content LIKE '{$search_word}'
       // 					OR {$wpdb->posts}.ID IN (
       // 						SELECT distinct post_id
       // 						FROM {$wpdb->postmeta}
       // 						WHERE {$wpdb->postmeta}.meta_key IN ('recipe_name','material', 'how_to_make') AND meta_value LIKE '{$search_word}'
       // 					)
       // 				) ";
       // 			}
       // 		}
       // 	}
       // 	return $search;
       // }
       // add_filter('posts_search','custom_search', 10, 2);

       /* search.phpで検索する範囲を「特定のカスタムフィールド」に限定する */
       function custom_search($search, $wp_query) {
       	global $wpdb;

       	if (!$wp_query->is_search) return $search;
       	if (!isset($wp_query->query_vars)) return $search;

       	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
       	if ( count($search_words) > 0 ) {
       		$search = '';
       		$search .= "AND post_type = 'article'";
       		foreach ( $search_words as $word ) {
       			if ( !empty($word) ) {
       				$search_word = '%'.esc_sql( $word ).'%';
       				$search .= " AND (
                {$wpdb->posts}.post_content LIKE '{$search_word}'
       					OR {$wpdb->posts}.ID IN (
       						SELECT distinct post_id
       						FROM {$wpdb->postmeta}
       						WHERE {$wpdb->postmeta}.meta_key IN ('recipe_name','material', 'how_to_make') AND meta_value LIKE '{$search_word}'
       					)
       				) ";
       			}
       		}
       	}
       	return $search;
       }
       add_filter('posts_search','custom_search', 10, 2);


       //
       //
       //


       // if ( $wp_query->get( 'custom_orderby' ) ) {
       //   $orderby = "{$wpdb->posts}.ID IN (
       //      SELECT distinct post_id
       //      FROM {$wpdb->postmeta}
       //      WHERE {$wpdb->postmeta}.meta_key IN 'recipe_name' AND meta_value LIKE '{$search_word}' = '' DESC, {$wpdb->posts}.post_date DESC ";
       // }
       // return $orderby;


       // ページネーション
       // special thanks
       // https://wemo.tech/978

       /**
       * ページネーション出力関数
       * $paged : 現在のページ
       * $pages : 全ページ数
       * $range : 左右に何ページ表示するか
       * $show_only : 1ページしかない時に表示するかどうか
       */
       function pagination( $pages, $paged, $range = 2, $show_only = false ) {

           $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
           $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

           //表示テキスト
           $text_first   = "« 最初へ";
           $text_before  = "‹ 前へ";
           $text_next    = "次へ ›";
           $text_last    = "最後へ »";

           if ( $show_only && $pages === 1 ) {
               // １ページのみで表示設定が true の時
               echo '<div class="pagination"><span class="current pager">1</span></div>';
               return;
           }

           if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

           if ( 1 !== $pages ) {
               //２ページ以上の時
               echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
               if ( $paged > $range + 1 ) {
                   // 「最初へ」 の表示
                   echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
               }
               if ( $paged > 1 ) {
                   // 「前へ」 の表示
                   echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
               }
               for ( $i = 1; $i <= $pages; $i++ ) {

                   if ( $i <= $paged + $range && $i >= $paged - $range ) {
                       // $paged +- $range 以内であればページ番号を出力
                       if ( $paged === $i ) {
                           echo '<span class="current pager">', $i ,'</span>';
                       } else {
                           echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                       }
                   }

               }
               if ( $paged < $pages ) {
                   // 「次へ」 の表示
                   echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
               }
               if ( $paged + $range < $pages ) {
                   // 「最後へ」 の表示
                   echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
               }
               echo '</div>';
           }
       }

; ?>
