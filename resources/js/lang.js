import Vue from 'vue'
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

export const i18n = new VueI18n({
    locale: 'en',
    fallbackLocale: 'ar',
    messages: {
        en: {
            home: "Home",
            AboutUs: "About Us",
            News: "News",
            Agriculture: "Agriculture",
            FoodStaff: "Food Staff",
            RenewableEnergy: "Renewable Energy",
            Others: "Others",
            Agencies: "Agencies",
            Partnership: "Partnership",
            Gallery: "Gallery",
            Branches: "Branches",
            ContactUs: "Contact Us"
        },
        ar: {
            home: "الرئيسية",
            AboutUs: "من نحن",
            News: "أخبار",
            Agriculture: "القسم الزراعي",
            FoodStaff: "القسم الغذائي",
            RenewableEnergy: " قسم طاقة متجددة",
            Others: "أخرى",
            Agencies: "الوكالات",
            Partnership: "شركائنا",
            Gallery: "معرض الصور",
            Branches: "الفروع",
            ContactUs: "تواصل معنا"
        }
    }
})
