<?php

$array = array(
    array(
        "id" => 1,
        "state" => "closed",
        "text" => "Documentos",
        "children" => array(
            array(
                "id" => 11,
                "text" => "Fotos",
                "state" => "closed",
                "children" => array(
                    array("id" => 111,
                        "text" => "Amigos",
                        "attributes" => array(
                        "url"=>"http://news.bbc.co.uk/rss/newsonline_world_edition/business/rss091.xml"
                        ),
                        ),
                    array("id" => 112,
                        "text" => "Familia"),
                    array("id" => 113,
                        "text" => "otros"),
                )
            ),
            array(
                "id" => 12,
                "text" => "Archivos de programa",
                "children" => array(
                    array(
                        "id" => 121,
                        "text" => "Intel"),
                    array(
                        "id" => 122,
                        "text" => "Java",
                        "attributes" => array(
                            "p1" => "Atributo 1",
                            "p2" => "Atributo 2"
                        )),
                    array(
                        "id" => 123,
                        "text" => "Office"),
                    array(
                        "id" => 124,
                        "text" => "Juegos")
                )
            ),
            array(
                "id" => 13,
                "text" => "index.html"),
            array(
                "id" => 14,
                "text" => "about.html"),
            array(
                "id" => 15,
                "state" => "closed",
                "text" => "welcome.html")
        )
    ),
    array("id" => 2,
        "text" => "Escritorio",
        "children" => array(
            array(
                "id" => 21,
                "text" => "Fotos",
                "state" => "closed",
                "children" => array(
                    array("id" => 111,
                        "text" => "Amigos",                        
                        "attributes" => array(
                        "url"=>""
                        ),),
                    array("id" => 112,
                        "text" => "Familia"),
                    array("id" => 113,
                        "text" => "otros")
                )
            )
        )
    )
);
echo json_encode($array, true);

$products = array(
    // product abbreviation, product name, unit price
    array('choc_cake', 'Chocolate Cake', 15),
    array('carrot_cake', 'Carrot Cake', 12),
    array('cheese_cake', 'Cheese Cake', 20),
    array('banana_bread', 'Banana Bread', 14)
);
//echo json_encode($products, true);
