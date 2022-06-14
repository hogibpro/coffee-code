<?php

namespace App\Commons;

class ErrorCode
{
    const _ = [
        // 認証
        '00' => [
            '001' => 'ログインに失敗しました。',
            '002' => 'ログアウトに失敗しました。',
        ],

        // マスタ管理＠ユーザ
        '01' => [
            '001' => 'ユーザが存在しません。',
            '002' => '更新対象のユーザが存在しません。',
            '003' => 'ログインユーザを削除することはできません。',
            '004' => 'パスワードリセット対象のユーザが存在しません。',
        ],

        //マスタ管理＠分野
        '03' => [
            '001' => '分野が存在しません。',
            '002' => '更新対象の分野が存在しません。',
            '003' => '削除対象の分野が存在しません。',
        ],
        // マスタ管理＠メールテンプレート
        '04' => [
            '001' => 'メールテンプレートが存在しません。',
            '002' => '更新対象のメールテンプレートが存在しません。',
            '003' => 'メールテンプレートのフォーマットが不正です。',
        ],
        //マスタ管理＠会費
        '05' => [
            '001' => '会費が存在しません。',
            '002' => '更新対象の会費が存在しません。',
        ],
        //マスタ管理＠会員規約
        '06' => [
            '001' => '会員規約が存在しません。',
            '002' => '更新対象の会員規約が存在しません。',
        ],
        //マスタ管理＠個人情報の取り扱い
        '07' => [
            '001' => '個人情報取り扱いが存在しません。',
            '002' => '更新対象の個人情報取り扱いが存在しません。',
        ],

        //リンク
        '12' => [
            '001' => '相互リンクが存在しません。',
            '002' => '更新対象の相互リンクが存在しません。'
        ],

        '09' => [
            '001' => 'フォーマットが存在しません。',
            '002' => '更新対象のフォーマットが存在しません。',
            '003' => '削除対象のフォーマットが存在しません。',
            '004' => 'ダウンロード対象のフォーマットが存在しません。',
        ],

        //マスタ管理＠仮会員
        '16' => [
            '001' => '仮会員が存在しません。',
            '002' => '更新対象の仮会員が存在しません。',
            '003' => '対象の仮会員が存在しません。',
            '004' => '対象の仮会員が存在しません。',
            '005' => 'その会員番号は既に使用されています。',
            '006' => 'メールアドレスは既に使用されています。',
        ],
        //マスタ管理＠業種
        '02' => [
            '001' => '業種が存在しません。',
            '002' => '更新対象の業種が存在しません。',
            '003' => '削除対象の業種が存在しません。',
            '004' => '更新対象の請求情報が存在しません。',
            '005' => '選択した年月に確定できる請求がありませんでした。',
            '006' => '更新対象の請求情報が存在しません。',
        ],

        //お知らせ
        '11' => [
            '001' => '企業が存在しません。',
            '002' => '更新対象の企業が存在しません。',
            '003' => '削除対象の企業が存在しません。',
        ],

        //意見箱
        '08' => [
            '001' => '意見が存在しません。',
            '002' => '意見が存在しません。',
            '003' => 'ステータスが正しくないため変更することが出来ません。',
            '004' => '意見が存在しません。 ',
            '005' => 'ステータスが正しくないため変更することが出来ません。',
            '006' => '意見が存在しません。 ',
            '007' => 'ステータスが正しくないため変更することが出来ません。',
            '008' => '意見が存在しません。',
            '009' => 'コメント登録対象の意見が存在しません。',
            '010' => 'ファイルは1件のコメントに5個までアップロード出来ます。',
            '011' => 'コメントが存在しません。',
            '012' => 'コメントの添付ファイルが存在しません。',
        ],

        //面談
        '14' => [
            '001' => '面談が存在しません。 ',
            '002' => '更新対象の面談が存在しません。 ',
            '003' => '面談確定日時は日付と時間をセットで入力してください。',
        ],

        //マスタ管理＠名刺作成
        '15' => [
            '001' => '名刺作成依頼が存在しません。',
            '002' => '更新対象の名刺作成依頼が存在しません。',
            '003' => '対象の名刺作成依頼が存在しません。',
            '004' => '対象の名刺作成依頼が存在しません。',
            '005' => '対象の名刺作成依頼が存在しません。',
        ],

        '18' => [
            '001' => '案件が存在しません。',
            '002' => '更新対象の案件が存在しません。',
            '003' => '案件申込会員情報が存在しません。',
            '004' => '案件担当会員情報が存在しません。',
            '005' => '申込会員がいるため削除できません。',
            '006' => '現在のステータスが非公開の場合は募集終了にできません。',
            '007' => '募集再開が出来るのは募集終了中の案件のみです。',
            '008' => '申込会員がいるため非公開にできません。',
            '009' => '指定会員の申込情報が存在しません。',
        ],
        // その他
        '99' => [
            '001' => 'メールのテンプレートコードがみつかりません',
            '002' => 'メールテンプレートへの差込に失敗しました。',
            '003' => 'メールの送信に失敗しました。',
        ],

        '17' => [
            '001' => '本会員が存在しません。',
            '002' => '稼働状況が登録されていません。',
            '003' => '本会員が存在しません。',
            '004' => '本会員がデータベース上に存在しません。',
            '005' => 'この本会員は既に退会しています。',
            '006' => '本会員がデータベース上に存在しません。',
            '007' => 'この本会員は退会していません。',
            '008' => '更新対象の本会員が存在しません。',
        ],

        '19' => [
            '001' => 'イベント・セミナーが存在しません。 ',
            '002' => '更新対象のイベント・セミナーが存在しません。 ',
            '003' => '更新対象のコマが存在しません。 ',
            '004' => '案件申込会員情報が存在しません。 ',
            '005' => 'コマが存在しません。',
            '006' => '指定の本会員が存在しません。',
            '007' => 'コマを１つ以上登録してください。',
            '008' => '会員申込履歴のあるイベント・セミナーのため削除できません。',
            '009' => '申込者がいる場合はイベント中止になっていないと非公開にできません。',
            '010' => '指定の回が存在しません。',
            '011' => '非公開またはイベント中止になっているため、募集終了にすることができません。',
            '012' => 'すでに募集終了になっています。',
            '013' => '非公開になっているため、イベント中止にすることができません。',
            '014' => 'すでにイベント中止になっています。',
            '015' => 'このコマには申込会員が存在しません。',
            '016' => '一度公開したイベント・セミナーのため、コマ登録ができません。',
            '017' => '一度公開したイベント・セミナーのため、コマ削除ができません。',
            '018' => '一度公開したイベント・セミナーのため、回の登録ができません。',
            '019' => '一度公開したイベント・セミナーのため、回の削除ができません。',
            '020' => '募集再開が出来るのは募集終了中のイベント・セミナーのみです。',
            '021' => '費用を有料にする場合、金額も入力してください。',
        ],

        '13' => [
            '001' => '請求情報が存在しません。 ',
            '002' => '請求情報が存在しません。 ',
            '003' => '更新対象の請求情報が存在しません。',
            '004' => '更新対象の請求情報が存在しません。 ',
            '005' => '選択した年月に確定できる請求がありませんでした。',
            '006' => '更新対象の請求情報が存在しません。',
            '007' => '更新対象の請求情報が存在しません。',
            '008' => '更新対象の請求情報が存在しません。',
            '009' => '確定できる請求ではありません。',
            '010' => '更新対象の請求情報が存在しません。',
            '011' => 'キャンセルできる請求ではありません。',
        ]

    ];
}
