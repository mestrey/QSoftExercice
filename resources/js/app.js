/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";

require("jquery");
require("slick-carousel");

$(function () {
    $("[data-slick-carousel]").slick({
        dots: true,
    });

    $("[data-accordion]").each(function () {
        let $accordion = $(this);
        let isOpen = $accordion.data("active") !== undefined;

        let $accordionToggle = $accordion.find("[data-accordion-toggle]");
        let $accordionNoActiveItem = $accordion.find(
            "[data-accordion-not-active]"
        );
        let $accordionActiveItem = $accordion.find("[data-accordion-active]");
        let $accordionContent = $accordion.find("[data-accordion-details]");

        $accordionToggle.on("click", function () {
            if (isOpen) {
                $accordionNoActiveItem.show();
                $accordionActiveItem.hide();
                $accordionContent.slideUp();
            } else {
                $accordionNoActiveItem.hide();
                $accordionActiveItem.show();
                $accordionContent.slideDown();
            }

            isOpen = !isOpen;
        });
    });
});

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from "./components/ExampleComponent.vue";
app.component("example-component", ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.globEager('./**/*.vue')).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount("#app");
