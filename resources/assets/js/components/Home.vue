<template>
    <v-app>
        <v-content app>
            <v-jumbotron
            src="https://images.wallpapersden.com/image/download/chevrolet-silverado-and-chevrolet-colorado-z71_59521_1366x768.jpg"
            :gradient="gradient"
            height="100%"
            >
                <v-toolbar color="transparent" dark class="elevation-0">
                    <v-toolbar-title>Title</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items class="hidden-sm-and-down">
                        <v-btn flat>Link One</v-btn>
                        <v-btn flat>Link Two</v-btn>
                        <v-btn flat>Link Three</v-btn>
                    </v-toolbar-items>            
                </v-toolbar>
                <v-container>
                    <v-layout align-center justify-center>
                        <v-flex text-xs-center>
                            <div class="white--text">
                                <small class="display-3">Revenda Herbie</small>
                            </div>
                        </v-flex>
                    </v-layout>
                    <v-layout>
                        <v-flex text-xs-center>
                            <div class="white--text">
                                <p class="headline">Os melhores preços só aqui</p>
                            </div>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-jumbotron>
            <v-container>
            <v-layout row>
                <v-flex text-xs-left>
                    <h2 class="display-3 blue--text">
                        Veiculos a venda
                    </h2>
                </v-flex>
            </v-layout>
                <slot name="lista"></slot>        
        </v-container>
        </v-content>
    </v-app>
</template>
<script>
export default {
    name: 'Home',
     data: () => ({
      gradient: 'to top right, rgba(51,51,255, .5), rgba(255,0,0, .4)',
      links: ['Home', 'About Us', 'Team', 'Services', 'Blog', 'Contact Us']
    })
}
</script>