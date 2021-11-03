# Reemplazando Hooks por Sistema de Eventos

El sistema de hooks todavía existe. Pero ya no todo usa hooks: algunos usan un nuevo sistema de eventos. Con los eventos, creas una función y luego le dices a Drupal que llame a tu función cuando algo sucede. 
Hmm... eso suena mucho a hooks.

Los eventos son la versión orientada a objetos de los hooks.

### Eventos vs Hooks
Cuando sucede algo en el núcleo de Drupal que podríamos querer conectar, Drupal envía un evento. Lo que realmente significa es que Drupal llama a todas las funciones que quieren ejecutarse cuando suceda este evento.

Y esto funciona como los hooks. Por ejemplo, cuando Drupal 7 crea un menú, sabe que es posible que interceptes ese proceso. Entonces, ejecuta **hook_menu ()**. Lo que esto realmente significa es que llama a todas las funciones que implementan este hook.

Se puede pensar en hook_menu como un "evento", y todas las devoluciones de llamada que lo implementan como "listeneres". En realidad, la única diferencia entre el sistema de hooks y el sistema de eventos es cómo le dices a Drupal que tienes un listener. Con los hooks, cree una función con el nombre correcto, como **tck_alter_menu()**, y Drupal lo llama automáticamente. Con eventos, crea una función con cualquier nombre y lo notificas a Drupal con la configuración.

### Ventajas de los eventos

**Orientado a objetos.**

Los hooks todavía se basan en el código procedural, lo que significa que la prueba unitaria es posible, pero más complicada. Como los eventos están orientados a objetos y admiten la inyección de dependencias, puede realizar una prueba unitaria de su evento. El código orientado a objetos presenta una mejor experiencia para el desarrollador que trabajar con funciones procedurales.

**Detener la propagación.**

Al igual que un evento de JavaScript, el Event Dispatcher permite que cualquier evento individual detenga la propagación, evitando que se activen los listeners de eventos posteriores. Esto no se puede hacer por ejemplo con un hook_alter.

**Disparar dos veces el mismo evento.**

De forma predeterminada, con el sistema de hooks, un hook se activa según la ordenación alfabética. Es decir, barfoo_some_hook irá antes que foobar_some_hook. Si se desea modificar el orden en el que se activan los hooks, puede modificar el peso del módulo en la tabla del sistema, que se aplica globalmente a todos los hooks, o implementar hook_module_implements_alter para reordenar por hook. 
Sin embargo, lo que no puedes hacer es disparar el hook dos veces. Con el sistema de eventos, puede registrar dos listeners para un evento, desde un mismo módulo. Esto significa que puedes ejecutar tu event listener al principio y al final cuando se despache el evento.

### Hooks en D7 y D8

Drupal 7:
```
module_invoke_all('my_event_name', $some_arbitrary_parameter);
```
Drupal 8:
```
\Drupal::moduleHandler()->invokeAll('my_event_name', [$some_arbitrary_parameter]);
```

References:

 - https://www.previousnext.com.au/blog/alter-or-dispatch-drupal-8-events-versus-alter-hooks
 - https://www.daggerhartlab.com/drupal-8-hooks-events-event-subscribers/
 - https://www.drupal.org/project/hook_event_dispatcher
 - https://symfonycasts.com/screencast/drupal8-under-the-hood/events-versus-hooks#:~:text=So%20you%20can%20think%20of,that%20you%20have%20a%20listener.
 - https://www.drupal.org/docs/creating-custom-modules/subscribe-to-and-dispatch-events