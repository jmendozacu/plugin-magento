# Plugin para Magento 1.6.x 1.7.x y 1.8.x

Este modulo provee el servicio de ComproPago para poder generar intensiones de pago dentro de la plataforma Magento.

* [Instalación](#install)
* [¿Cómo trabaja el modulo?](#howto)
* [Configuración](#setup)
* [Sincronización con los webhooks](#webhook)


<a name="install"></a>
## Instalación:

1. Copiar los directorios **app**, **skin** y **js** en el mismo orden, en directorio raiz de Magento. Asegurate de mantener la estructura en los directorios.
2. En el panel de administración ir a **System > Cache Management** y limpiar la cache de todos los directorios.

	![Cache Management](https://raw.github.com/compropago/plugin-magento/master/README.img/3.png)<br />
3. Ir a **System>IndexManagement** seleccionar todos los directorios y dar  click en **Reindex Data** y  **Submit**.

	![Index Managment](https://raw.github.com/compropago/plugin-magento/master/README.img/4.png)

---

<a name="howto"></a>
## ¿Cómo trabaja el modulo?
Una vez que el cliente sabe que comprar y continua con el proceso de compra entrará a la opción de elegir metodo de pago justo aqui aparece la opción de pagar con ComproPago<br /><br />
![ComproPago](https://raw.github.com/compropago/plugin-magento/master/README.img/15.png)
<br />
Una vez que el cliente completa su orden de compra iniciara el proceso para generar su intensión de pago, el cliente selecciona el establecimiento y recibe las instrucciones para realizar el pago.
![ComproPago](https://raw.github.com/compropago/plugin-magento/master/README.img/16.png) 
<br /><br />
Una vez que el cliente genero su intención de pago, dentro del panel de control de ComproPago la orden se muestra como "PENDIENTE" esto significa que el usuario esta por ir a hacer el deposito.

![ComproPago](https://raw.github.com/compropago/plugin-magento/master/README.img/19.png) 
---
<a name="setup"></a>
## Configurar ComproPago

1. Para iniciar la configuración ir a **System > Configuration > Sales > Payment Methods**. Seleccionar **ComproPago**.

2. Agregar la **llave privada** y **llave pública**, esta se puede encontrar en el apartado de configuración dentro del panel de control de ComproPago. [https://compropago.com/panel/configuracion](https://compropago.com/panel/configuracion)
<br />
![ComproPago](https://raw.github.com/compropago/plugin-magento/master/README.img/7.png) 
3. Agregar la URL de exito y fallido, para este caso se cambiara en ambos casos solo el nombre de dominio y el directorio raíz donde se instalo Magento.
***Note:*** La dirección estandar es ***[direcciondetusitio.com]***/index.php/checkout/onepage/success/ 

![ComproPago](https://raw.github.com/compropago/plugin-magento/master/README.img/8.png) 

---

<a name="webhook"></a>
## Sincronización con la notificación Webhook

1. Ir al area de **Webhooks** en ComproPago [https://compropago.com/panel/webhooks](https://compropago.com/panel/webhooks)

2. Introducir la dirección: ***[direcciondetusitio.com]***/index.php/cpfaster/webhook/
![ComproPago](https://raw.github.com/compropago/plugin-magento/master/README.img/9.png)

3. Dar click en el botón "Probar" y verificamos que el servidor de la tienda esta respondiendo, debera aparecer el mensaje de "Order not valid"
![ComproPago](https://raw.github.com/compropago/plugin-magento/master/README.img/10.png)

---

Una vez completado estos pasos el proceso de instalación queda completado.
