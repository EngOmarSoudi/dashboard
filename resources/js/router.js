import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

// Admin Router
import login from './components/dashboard/login/Login.vue'

import indexdashboard from './components/dashboard/Image_Slider/index.vue'
import addImageSlider from './components/dashboard/Image_Slider/create.vue'
import editImageSlider from './components/dashboard/Image_Slider/edit.vue'


import aboutUs from './components/dashboard/About_Us/index.vue'
import addAboutUsSection from './components/dashboard/About_Us/create.vue'
import editAboutUsSection from './components/dashboard/About_Us/edit.vue'

import News from './components/dashboard/News/index.vue'
import addNews from './components/dashboard/News/create.vue'
import editNews from './components/dashboard/News/edit.vue'



import agencies from './components/dashboard/Agencies/index.vue'
import addagencies from './components/dashboard/Agencies/create.vue'
import editagencies from './components/dashboard/Agencies/edit.vue'



import partnership from './components/dashboard/Partnership/index.vue'
import addpartnership from './components/dashboard/Partnership/create.vue'
import editpartnership from './components/dashboard/Partnership/edit.vue'



import Sections from './components/dashboard/Sections/index.vue'
import addSectionsSection from './components/dashboard/Sections/create.vue'
import editSectionsSection from './components/dashboard/Sections/edit.vue'



import Subsections from './components/dashboard/subsections/index.vue'
import addSubsectionsSection from './components/dashboard/subsections/create.vue'
import editSubsectionsSection from './components/dashboard/subsections/edit.vue'

// import agriculture from './components/dashboard/Agriculture/index.vue'
// import addagricultureSection from './components/dashboard/Agriculture/create.vue'
// import editagricultureSection from './components/dashboard/Agriculture/edit.vue'


// import FoodStaff from './components/dashboard/Food_Staff/index.vue'
// import addFoodStaffSection from './components/dashboard/Food_Staff/create.vue'
// import editFoodStaffSection from './components/dashboard/Food_Staff/edit.vue'


// import RenewableEnergy from './components/dashboard/Renewable_Energy/index.vue'
// import addRenewableEnergySection from './components/dashboard/Renewable_Energy/create.vue'
// import editRenewableEnergySection from './components/dashboard/Renewable_Energy/edit.vue'



// import Others from './components/dashboard/Others/index.vue'
// import addOthersSection from './components/dashboard/Others/create.vue'
// import editOthersSection from './components/dashboard/Others/edit.vue'



import ContactInformation from './components/dashboard/Contact_Information/index.vue'

import gallery from './components/dashboard/Gallery/index.vue'





import Branch from './components/dashboard/Branches/index.vue'
import addBranchSection from './components/dashboard/Branches/create.vue'
import editBranchSection from './components/dashboard/Branches/edit.vue'



import accountManagement from './components/dashboard/Accounts_Management/index.vue'
import accountDetails from './components/dashboard/Accounts_Management/view.vue'
import addAccount from './components/dashboard/Accounts_Management/create.vue'
import editAccount from './components/dashboard/Accounts_Management/edit.vue'
import profile from './components/dashboard/Accounts_Management/profile.vue'

const routes = [
    // Admin Router
    {
		path: '/login',
		component: login
	},
    {
		path: '/admin',
		component: indexdashboard
	},
	{
		path: '/admin/image-slider/create',
		component: addImageSlider
	},
	{
		path: '/admin/image-slider/edit/:id',
		component: editImageSlider
	},


	{
		path: '/admin/about-us',
		component: aboutUs
	},
	{
		path: '/admin/about-us/create',
		component: addAboutUsSection
	},
	{
		path: '/admin/about-us/edit/:id',
		component: editAboutUsSection
	},



    {
		path: '/admin/branches',
		component: Branch
	},
	{
		path: '/admin/branches/create',
		component: addBranchSection
	},
	{
		path: '/admin/branches/edit/:id',
		component: editBranchSection
	},



    {
		path: '/admin/news',
		component: News
	},
	{
		path: '/admin/news/create',
		component: addNews
	},
	{
		path: '/admin/news/edit/:id',
		component: editNews
    },



    {
		path: '/admin/agencies',
		component: agencies
	},
	{
		path: '/admin/agencies/create',
		component: addagencies
	},
	{
		path: '/admin/agencies/edit/:id',
		component: editagencies
	},




    {
		path: '/admin/partnership',
		component: partnership
	},
	{
		path: '/admin/partnership/create',
		component: addpartnership
	},
	{
		path: '/admin/partnership/edit/:id',
		component: editpartnership
	},


    {
		path: '/admin/sections',
		component: Sections
	},
	{
		path: '/admin/sections/create',
		component: addSectionsSection
	},
	{
		path: '/admin/sections/edit/:id',
		component: editSectionsSection
	},

    {
		path: '/admin/subsections',
		component: Subsections
	},
	{
		path: '/admin/subsections/create',
		component: addSubsectionsSection
	},
	{
		path: '/admin/subsections/edit/:id',
		component: editSubsectionsSection
	},

    // {
	// 	path: '/admin/agriculture',
	// 	component: agriculture
	// },
	// {
	// 	path: '/admin/agriculture/create',
	// 	component: addagricultureSection
	// },
	// {
	// 	path: '/admin/agriculture/edit/:id',
	// 	component: editagricultureSection
	// },



    // {
	// 	path: '/admin/food-staff',
	// 	component: FoodStaff
	// },
	// {
	// 	path: '/admin/food-staff/create',
	// 	component: addFoodStaffSection
	// },
	// {
	// 	path: '/admin/food-staff/edit/:id',
	// 	component: editFoodStaffSection
	// },



    // {
	// 	path: '/admin/renewable-energy',
	// 	component: RenewableEnergy
	// },
	// {
	// 	path: '/admin/renewable-energy/create',
	// 	component: addRenewableEnergySection
	// },
	// {
	// 	path: '/admin/renewable-energy/edit/:id',
	// 	component: editRenewableEnergySection
	// },



    // {
	// 	path: '/admin/others',
	// 	component: Others
	// },
	// {
	// 	path: '/admin/others/create',
	// 	component: addOthersSection
	// },
	// {
	// 	path: '/admin/others/edit/:id',
	// 	component: editOthersSection
	// },



    {
		path: '/admin/contact-information',
		component: ContactInformation
    },




	{
		path: '/admin/gallery',
		component: gallery
	},



	{
		path: '/admin/account',
		component: accountManagement
	},
	{
		path: '/admin/account/view/:id',
        component: accountDetails,
	},
	{
		path: '/admin/account/create',
		component: addAccount
	},
	{
		path: '/admin/account/edit/:id',
        component: editAccount,
	},
	{
		path: '/admin/profile',
		component: profile
    },

]


export default new Router({
	mode: 'history',
	routes
})
