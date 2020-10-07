<?php

/**
 * データベース操作基底クラス
 * データベースへアクセスするスーパークラス
 * ?????親クラス、スーパークラス
 * ?????データベースへの接続処理のみ
 * 
 * ?????各テーブルに対する処理は、
 * スーパークラスを継承したサブクラス(子クラス)として作成
 */
class Base
{
    // constで定義した定数はプログラムコード全体のどこからでも参照
    // できるグローバル定数 関数定義、if文などのブロック内で定義できない
    // メンバを!!!定数(const)で!!!作成
    /** @var string 接続データベース名 */
    const DB_NAME = 'php_work';

    /** @var string データベースホスト名 */
    const DB_HOST = 'localhost';

    /** @var string データベース接続ユーザー名 */
    const DB_USER = 'root';

    /** @var string データベース接続パスワード */
    const DB_PASS = '';

    /** @var object PDOクラスインスタンス */
    // protected は子クラスTodoItemsで使える
    protected $dbh;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        // データベースに接続するための文字列（DSN 接続文字列）
        $dsn = 'mysql:dbname='.self::DB_NAME.';host='.self::DB_HOST.';charset=utf8';

        // PDOクラスのインスタンス
        /** @var object PDOクラスインスタンス protected $dbh; */
        // 「PDOクラスインスタンスを代入する変数」に代入???????
        $this->dbh = new PDO($dsn, self::DB_USER, self::DB_PASS);

        // エラーが起きたときのモードを指定する
        // 「PDO::ERRMODE_EXCEPTION」を指定すると、エラー発生時に例外がスローされる
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}