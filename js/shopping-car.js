let shoppingCar = {
    products: [],
    prices: [],
    descriptions: [],
    amount: []
};

function addToTheCar(elmnt) {
    let i = shoppingCar.products.indexOf(elmnt.name);

    if (i === -1) {
        shoppingCar.products.push(elmnt.name);
        shoppingCar.prices.push(elmnt.price);
        shoppingCar.descriptions.push(elmnt.description);
        shoppingCar.amount.push(1);
    } else {
        shoppingCar.amount[i]++
    }
}

function removeFromTheCar(elmnt) {
    let i = shoppingCar.products.indexOf(elmnt.name);

    shoppingCar.amount[i]--

    if(shoppingCar.amount[i] === 0) {
        shoppingCar.products.splice(i, 1);
        shoppingCar.prices.splice(i, 1);
        shoppingCar.descriptions.splice(i, 1);
        shoppingCar.amount.splice(i, 1);
    }
}

// PRODUCTOS

class Product {
    constructor(name, price, description) {
        this.name = name,
        this.price = price,
        this.description = description;
    }
};

// Comidas
let padThai = new Product("Pad Thai", 85, "Se trata de fideos de arroz fritos con gama o pollo, según prefieras, hechos con huevo, tofu, verduras y, el ingrediente secreto, una salsa con base de tamarindo y azúcar de palma.");

let somTam = new Product("Som Tam", 45, "Una ensalada de papaya típica de la región de Isan, la zona más grande y poblada de Tailandia y la menos visitada. Además de la papaya, lleva chili, ajo, tomate y cacahuetes. Se aliña con una salsa de pescado (pla raa).");

let kaoPadSeparod = new Product("Kao Pad Separod", 45, "Se trata de arroz frito con gambas o pollo, piña, huevo, anacardos, pasas y salsa de pescado. Se hace con curri en polvo, así que también tiene un toque de sabor a curri.");

let kaiPadMedMamuang = new Product("Kai Pad Med Mamuang", 99, "Se trata de un plato de pollo, anacardos, pimienta, cebolla, champiñones y todo con una salsa hecha de salsa de ostras y soja. Se acompaña de un plato de arroz blanco o integral.");

let padKrapau = new Product("Pad Krapau", 30, "Se trata un plato de arroz con pollo con chile y albahaca. Se hace con una salsa de ostras y pimienta.");

let padSiuw = new Product("Pad Siuw", 35, "Es un plato de fideos salteados con pollo, huevo, pimienta, ajo y hecho con salsa de ostras.");

let kaiTod = new Product("Kai Tod", 55, "Se trata de alitas de pollo rebozadas con ajo y perejil.");

let kuaiTieow = new Product("Kuai Tieow", 30, "Se hace remojando rápidamente los fideos en el caldo hirviendo y añadiendo el resto de ingredientes.");

let yamMaKhwaYao = new Product("Yam Ma Khwa Yao", 85, "Se trata de una ensalada de berenjena con salsa de pescado, limón, cebolleta, huevos y gambitas secas. Tiene un sabor dulce-salado y, a veces, algo picante.");

let kaiMuSatae = new Product("Kai Mu Satae", 85, "Son pinchos de pollo o cerdo. Los pinchos se hacen a la barbacoa y se comen una deliciosa ensalada de cacahuete.");


// Bebidas
let chaYen = new Product("Cha Yen", 20, "Se trata de un tipo de té negro que se prepara con agua hirviendo y se combina con un  poco de leche condensada azucarada, pero su proceso no se termina aquí, pues parte de su sabor es la forma de servirse sobre hielo, con azúcar y un poco de leche evaporada encima.");

let chaManao = new Product("Cha Manao", 25, "Algo que particularmente llama la atención de este tipo de té, es su sabor similar al de Chan Yen, pero en lugar de usar la leche condensada, se usa jugo de lima recién exprimido.");

let naManao = new Product("Na Manao", 25, "Se trata de una bebida refrescante que tiene una similitud con el agua de lima, pues incluso utiliza los mismos ingredientes que en otros países: Jugo de lima, agua y azúcar.");

let sodadeManao = new Product("Soda de Manao", 25, "Este es un refresco que se prepara con jugo de lima fresco servido con agua de soda y jarabe de azúcar.");

let singhaCerveza = new Product("Singha cerveza", 25, "Se trata de una bebida universal y claro, cada país tiene sus propias marcas y sus propias maneras de prepararlo.");

let siamMary = new Product("Siam Mary", 30, "Sabor fuerte, preparado con chile tailandés, wasabi, albahaca, cilantro, hierba de limón y jugo de tomate.");

let oliangcafe = new Product("Oliang cafe", 30, "Tienen su propia marca y manera de prepararlo, se toma frío.");


// Postres
let khaoTomMad = new Product("Khao Tom Mad", 35, "Es un delicioso postre tradicional tailandés hecho de arroz glutinoso, plátano, leche de coco, todo ello en una hoja de plátano.");

let stickyRiceconMango = new Product("Sticky Rice con mango", 30, "Es una especie de arroz con leche que se hace con crema de coco y se sirve con mango fresco al lado, lleno de sabor, dulce y fresco.");

let kluayTod = new Product("Kluay Tod", 40, "Plátanos fritos con leche de almendra.");

let khanomTarn = new Product("Khanom Tarn", 40, "Estos pequeños pastelitos están hechos de palmito (cogollo de la palmera) al vapor para después, en una cesta hecha de hoja de palmera.");

let khanomPangWan = new Product("Khanom Pang Wan", 35, "Panes de hamburguesa rellenos de ingredientes dulces y multicolores, o los Salim más conocidos como fideos de cristal en leche de coco dulce.");