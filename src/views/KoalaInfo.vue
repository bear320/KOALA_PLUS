<template>
    <Header></Header>
    <section class="wrapper nav-space">
        <div class="breadcrumb">
            <router-link to="/home">Home</router-link>
            <router-link to="/support">資助認養</router-link>
            <router-link :to="`/support/${temp.name}`">
                {{ temp.name }}
            </router-link>
        </div>
    </section>
    <section class="wrapper">
        <div class="koala-info">
            <div class="img">
                <ImageSlider :imgs="images"></ImageSlider>
            </div>
            <div class="text">
                <div class="paragraph">
                    <h1>{{ temp.name }}</h1>
                </div>
                <div class="paragraph">
                    <h3>性別： {{ temp.sex }}</h3>
                    <h3>生日： {{ temp.dob }}</h3>
                </div>
                <div class="paragraph">
                    <p>{{ temp.description }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="plans" id="plans">
        <div class="wrapper">
            <h2>該如何幫助受災的無尾熊呢？</h2>
            <h3>我們提供了兩種幫助無尾熊的方案</h3>
            <div class="plan-wrapper">
                <PlanCard
                    v-for="plan in plans"
                    :key="plan.id"
                    :pName="plan.pName"
                    :pPrice="plan.pPrice"
                    :pPoint="plan.pPoint"
                    :pGift1="plan.pGift1"
                    :pGift2="plan.pGift2"
                    :pDesc="plan.pDesc"
                    :pBtn="plan.pBtn"
                ></PlanCard>
            </div>
        </div>
    </section>
    <section class="wrapper faqs">
        <h2>認養 FAQs</h2>
        <Collapse v-model="value" class="collapse">
            <Panel name="1">
                我捐助的費用將用於何處？
                <template #content>
                    <p>
                        根據您支持的方案不同，您捐助的費用也會用於不同的用途，詳細用途可參考上述
                        <a href="#plans">方案說明</a> 。
                    </p>
                </template>
            </Panel>
            <Panel name="2">
                資助 / 認養有條件限制嗎？
                <template #content>
                    <p>
                        沒有，任何人在任何地方、任何時候都可以資助 /
                        認養無尾熊！
                    </p>
                    <p>
                        除了鮮花之外，領養無尾熊也是生日、紀念日和任何特殊場合的絕佳禮物，它也可作為獎勵、籌款和紀念禮物。你的領養證書可在會員專區中下載，就算遺失也不用害怕，這是算是一種快速而簡單的送禮方式。
                    </p>
                </template>
            </Panel>
            <Panel name="3">
                資助 / 認養後我會獲得什麼？
                <template #content>
                    <p>
                        根據你所支持的方案不同，您所獲得的東西也會有所不同，詳細說明可參考上述
                        <a href="#plans">方案說明</a> 。
                    </p>
                </template>
            </Panel>
            <Panel name="4">
                可以把認養的無尾熊帶回家嗎？
                <template #content>
                    <p>
                        很抱歉，您並不能將您認養的無尾熊帶回家！領養是一種象徵性的行為，表達你對受災無尾熊的支援。
                    </p>
                </template>
            </Panel>
            <Panel name="5">
                多久能收到我的資助 / 認養證明呢？
                <template #content>
                    <p>
                        通常情況下，只要您資助 /
                        認養成功後，就可以至會員專區中下載屬於您的資助 /
                        認養證明，若您的證明資訊有誤，請與我們進行聯繫！
                    </p>
                </template>
            </Panel>
            <Panel name="6">
                我想詢問其他資助 / 認養的問題呢？
                <template #content>
                    <p>
                        您可以在園區營業時間內透過下列方式與我們進行聯繫：<br />
                        電話｜
                        <a href="tel:+12025550156">+1 202 555 0156</a><br />
                        信箱｜
                        <a href="mailto:koalaplus@koalaplus.com"
                            >koalaplus@koalaplus.com</a
                        ><br />
                    </p>
                </template>
            </Panel>
        </Collapse>
    </section>
    <Footer></Footer>
</template>

<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import ImageSlider from "@/components/shop/ImageSlider.vue";
import PlanCard from "@/components/koalaInfo/PlanCard.vue";
export default {
    components: {
        Header,
        Footer,
        ImageSlider,
        PlanCard,
    },
    data() {
        return {
            images: [
                "banner1.jpg",
                "banner2.jpg",
                "banner3.jpg",
                "drawing1.png",
            ],
            koalaInfo: [
                {
                    name: "Ronny",
                    category: "koala",
                    dob: "2018-01-12",
                    sex: "male",
                    description:
                        "Hi my name is Ronny. Aren’t I adorable? I am a wee orphan and was found in Salamander Bay after being chased by some nasty crows. I miss my mum but the carers are so loving that I feel very safe in their care. I am so lucky to be fed around the clock (not so lucky for my carers!) but I am practicing my big koala skills and starting to eat leaf. I will be in care for a while until I am big and strong and able to look after myself in the wild.",
                    images: ["Ronny-1.jpg", "Ronny-2.jpg", "Ronny-3.jpg"],
                    price: 1000,
                },
                {
                    name: "Veronica",
                    category: "koala",
                    dob: "2020-02-16",
                    sex: "female",
                    description:
                        "Hi my name is Veronica! I am an 8-year-old female and I am suffering with a tear production issue. I have daily treatment to my eyes to assist with my recovery and this treatment is very delicate and time consuming. I sense my carers are taking very good care of me and although there has been some improvement, I still have a long journey in front of me before I recover my full eyesight. Please adopt me to help me get better.",
                    images: ["Veronica-1.jpg", "Veronica-2.jpg"],
                    price: 1000,
                },
                {
                    name: "Jacko",
                    category: "koala",
                    dob: "2018-05-18",
                    sex: "male",
                    description:
                        "Hello, my name is Jacko! I am a six-year-old male was hit by a car for the second time – oh dear! I received an extensive examination which revealed no serious injury. However I did suffer superficial nose damage which must be completely healed before I can be released. I have been told I have a lovely manner and am quite happy being spoiled in my own personal yard. Apparently, I will be in care for some time while I recover from my injuries, so please adopt me to help me get better.",
                    images: ["Jacko-1.jpg", "Jacko-2.jpg", "Jacko-3.jpg"],
                    price: 1000,
                },
                {
                    name: "Peter",
                    category: "koala",
                    dob: "2018-11-11",
                    sex: "male",
                    description:
                        "Hello, my name is Peter and I am a one-year-old orphan. During my check-up it was discovered I had ocular chlamydia and then I got pneumonia! For this I receive nebuliser treatment three time a day. But that is not all – I was then diagnosed with diabetes so I have begun insulin treatment which means I will be in hospital for a long time. It would be great if you can you please adopt me to help the hospital with the costs for my treatments – thank you so much!",
                    images: [
                        "Peter-1.jpg",
                        "Peter-2.jpg",
                        "Peter-3.jpg",
                        "Peter-4.jpg",
                    ],
                    price: 1000,
                },
                {
                    name: "Jackie Chan",
                    category: "koala",
                    dob: "2018-06-21",
                    sex: "male",
                    description:
                        "Hi my name is Jackie Chan. I am a very handsome male joey from Salamander Bay, rescued by a lovely lady called Jackie. But why the Chan you ask? Well, I am a master in kung fu of course! You should see my moves when the vet tries to conduct my examination. Ha ya! I am quite feisty and now that I have had some extra help to grow big and strong I have been released back into the wild. By adopting me you are helping my koala brothers and sisters who are still in the hospital.",
                    images: [
                        "Jackie-Chan-1.jpg",
                        "Jackie-Chan-2.jpg",
                        "Jackie-Chan-3.jpg",
                        "Jackie-Chan-4.jpg",
                    ],
                    price: 1000,
                },
                {
                    name: "Midnight Rose",
                    category: "koala",
                    dob: "2018-07-06",
                    sex: "female",
                    description:
                        "Hi my name is Midnight Rose. I was brought to PSKH after being hit by a car. Luckily for me I only suffered from a wound on one of my legs. I am now all recovered and spend my days in the big girls’ yard. I can be elusive and hard to spot as I love to nestle in forks high in the trees. My favourite leaf types are swamp mahogany and argyle apple, which I love to come down late in the afternoon to munch on. My carers can tell me apart from the other girls from a beauty spot above my lips. I am quite beautiful like my namesake and very placid and sweet when handled. Please adopt me to help care for me and my brothers and sisters here at the koala sanctuary.",
                    images: ["Midnight-Rose-1.jpg", "Midnight-Rose-2.jpg"],
                    price: 1000,
                },
                {
                    name: "Tilly",
                    category: "koala",
                    dob: "2019-02-14",
                    sex: "male",
                    description:
                        "Hi my name is Tilly.  I was rescued in 2019 when I was a joey and I was found without my mum. The carers at PSKH took me in and I grew big and strong alongside the other girls. I now call the big girls yard my home. I love to climb high in my sanctuary trees and feel the wind ruffle my fur. My favourite leaf is swamp mahogany. I give the carers the hardest time catching me for a health check as I love to jump from the leaf area to the trees to evade them. Despite this cheekiness, I am gentle and well-tempered, even when my fellow koalas on occasion sit on me! By adopting me you are helping to care for me and all my friends here at the koala hospital.",
                    images: [
                        "Tilly-1.jpg",
                        "Tilly-2.jpg",
                        "Tilly-3.jpg",
                        "Tilly-4.jpg",
                    ],
                    price: 1000,
                },
                {
                    name: "Spring",
                    category: "koala",
                    dob: "2020-04-08",
                    sex: "female",
                    description:
                        "Hi my name is Spring. My carers can tell me with ease for the pink beauty spot on my nose. I was found in 2020 in a busy street of Nelson Bay with no suitable habitat around me. I was moved to PSKH, where I reside in the big girls yard. I am now fully mature and will be a crucial member of the breeding program. Though I may be smaller than some of my yard mates, I am still pretty mighty and can hold my own. My favourite leaf species are swamp mahogany and forest red gum. Please adopt me to help care for me and my fellow koalas here at the koala sanctuary.",
                    images: ["Spring-1.jpg", "Spring-2.jpg", "Spring-3.jpg"],
                    price: 1000,
                },
                {
                    name: "Basil",
                    category: "koala",
                    dob: "2018-07-18",
                    sex: "male",
                    description:
                        "Hi my name is Basil. My mum Rosemary and I were brought to the Koala Hospital after we got stranded in the middle of a busy road. I was so scared! I am almost one year old and soon will no longer need mum’s milk. I am looking forward to the day I can munch on the eucalyptus trees like my other brothers and sisters. I am not sure what my future brings, whether I will be strong enough for release or if the koala hospital will be my forever home. Thankfully the wonderful staff and carers will continue to take care of me. They love to dote on me because I am so cute! Don’t you think so? By adopting me you are helping to care not just for me but for all my friends here at the koala hospital.",
                    images: ["Basil-1.jpg", "Basil-2.jpg"],
                    price: 1000,
                },
                {
                    name: "Blinky",
                    category: "koala",
                    dob: "2020-07-21",
                    sex: "male",
                    description:
                        "Hi I’m Blinky – a cute as a button koala joey. My mum Martha and I were rescued and are now safe and sound at the koala hospital. I am named after Blinky Bill – a cheeky boy in the form of a koala, who is known for his mischievousness and his love for his mother. I am a typical toddler who throws tantrums when I am being treated – I want to go and play! I am getting more confident by the day and am starting to move around the enclosure and explore without mum. When I am all better mum and I hope to be released back into the wild. Please adopt me to help care for all my brothers and sisters so they can one day be released too.",
                    images: [
                        "Blinky-1.jpg",
                        "Blinky-2.jpg",
                        "Blinky-3.jpg",
                        "Blinky-4.jpg",
                    ],
                    price: 1000,
                },
                {
                    name: "Martha",
                    category: "koala",
                    dob: "2019-11-11",
                    sex: "male",
                    description:
                        "Hi I’m Martha! I was rescued with my joey Blinky after being threatened by a tree goanna. We are both now safe and sound after having treatment at the hospital. I am very sweet and my favourite leaf is peppermint gum – sweet just like me! My carers think I am a pleasure and I hope you do too! Even though I have been released it would be very much appreciated if you would adopt me to help care for all my brothers and sisters so they can one day be released too.",
                    images: ["Martha-1.jpg", "Martha-2.jpg"],
                    price: 1000,
                },
                {
                    name: "Matt",
                    category: "koala",
                    dob: "2021-05-26",
                    sex: "female",
                    description:
                        "Hi I am Medowie Matt. I was rescued by a lovely builder called Matt climbing a house frame on a building site in Medowie looking for a safe spot for a rest. I am named after the area I was found and the name of the kind person who found me – hence Medowie Matt! I have been having daily treatments in the hospital but now I am all better and have been released back into the wild. Please adopt me to help with the costs of looking after my brothers and sisters and towards running the Port Stephens Koala Hospital. You never know – I may need to visit again.    Thank you! x",
                    images: ["Matt-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Sunset",
                    category: "koala",
                    dob: "2018-08-28",
                    sex: "male",
                    description:
                        "Miss Sunset is a beautiful old local girl who was first encountered in 2010 as a young sub-adult after she was found sitting on a boat ramp at Sunset Beach, Soldiers Point.  This was just the beginning of her long and varied rescue history (including injuries that left her blind in one eye) as she insisted on hanging out in a very popular tourist spot with high traffic flow. Sadly, this year, she was found sitting in the middle of a road, suffering from a broken hip. Her hip is taking a long time to heal, perhaps because of her age, however after some much needed R&R she has regained some of her climbing ability.  She has been moved into a beautiful Sanctuary enclosure where she can safely spend her twilight years.",
                    images: ["Sunset-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Howie",
                    category: "koala",
                    dob: "2022-03-12",
                    sex: "female",
                    description:
                        "Howie is a local celebrity who used to live in and around the grounds of Soldiers Point School. He was well known to the teachers and students who watched out for him.  He has been rescued and treated repeatedly for conjunctivitis.  Most recently, he disappeared from his usual home range after a larger, younger male took over his territory.  When he was found again, his old problem had returned.  His eye has improved in care, however he is being kept in for extended observation to ensure there is no recurrence of the disease. ",
                    images: ["Howie-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Joanie",
                    category: "koala",
                    dob: "2019-09-11",
                    sex: "male",
                    description:
                        "When Joanie was brought in with a wounded eye, she had a joey in her pouch. She managed to care for him despite her condition and once he was old enough, Pablo was released back to the wild. Unfortunately, Joanie’s eyesight did not improve and she remains in permanent care with us.",
                    images: ["Joanie-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Tai",
                    category: "koala",
                    dob: "2019-05-18",
                    sex: "female",
                    description:
                        "Tai is a handsome male koala who is blind and so will remain with us in permanent care. He dribbles when he eats his gum leaves – but doesn’t seem to mind when the volunteer carers wipe his chin!",
                    images: ["Tai-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Eila",
                    category: "koala",
                    dob: "2018-03-04",
                    sex: "male",
                    description:
                        "Eila is one of the koalas caught in the Mambo wetlands fire late in 2018. She has badly burned paws from climbing a burning tree. She has had extensive treatment for her burns and has responded well but will still be in care for a long time while she recovers. While Eila was in care it was discovered that she had a tiny joey on board.",
                    images: ["Eila-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Maree",
                    category: "koala",
                    dob: "2018-12-17",
                    sex: "female",
                    description:
                        "SES Maree is a very sweet natured female came into care after she was hit by a car and suffered an injury to her head and the loss of her eyesight. Initially it was hoped that she sight would return but it has been confirmed by a Veterinary Neurologist that the loss is permanent. The accident has also left Maree with damage to her frontal lobe and a tenancy to turn in circles to the right when on the ground. Maree is not releasable and will be in care long term.",
                    images: ["Maree-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Nifty Latty",
                    category: "koala",
                    dob: "2021-08-07",
                    sex: "male",
                    description:
                        "Sweet wee Nifty Latty was brought into care after a weekend long rescue effort. This beautiful little girl was spotted looking a bit worse for wear with a brown dirty bottom on the outskirts of an area recently affected by bushfire. Unfortunately her mum, who was also suffering from ‘wet bottom’, could not be located. Latty is getting lots of TLC, fed lots of lush leaf (her favourite is Melaleuca) and has been successfully treated for Chlamydia. She’s not out of the woods yet but we are very hopeful for her recovery. She has been named in honour of Nifty Lift who generously donated a towable work platform for koala rescue and leafing operations, and her rescue location, Latitude One.",
                    images: ["Nifty-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Jax",
                    category: "koala",
                    dob: "2018-03-20",
                    sex: "female",
                    description:
                        "Poor Jax came into our care after being hit by a vehicle in Salamander Bay, and left at the roadside with a broken leg. However, Jax is a very determined boy and after 10 weeks of intensive homecare, he was moved to one of our larger yards for further rehabilitation.",
                    images: ["Jax-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Solstice",
                    category: "koala",
                    dob: "2021-11-26",
                    sex: "male",
                    description:
                        "Solstice came into care after a car hit him, leaving him with radial nerve damage and a limited range of motion. He required intensive therapy on his arm and is recovering well despite such trauma. Solstice has a great personality but likes to sleep a lot!",
                    images: [
                        "Solstice-1.jpg",
                        "Solstice-2.jpg",
                        "Solstice-3.jpg",
                        "Solstice-4.jpg",
                    ],
                    price: 1000,
                },
                {
                    name: "Harriet",
                    category: "koala",
                    dob: "2018-06-08",
                    sex: "female",
                    description:
                        "Hi my name is Harriet. I am the ripe old age of 15 years which is a grand age for a koala. I am like the old madam of the Koala Hospital – I could tell you a tale or two I can assure you! Due to my age and lack of eyesight I will be a permanent resident at the Koala Hospital but I know that the wonderful staff and carers will continue to take care of me for the rest of my life. By adopting me you are helping to care not just for me but for all my friends here at the koala hospital, so I thank you from the bottom of my furry old heart.",
                    images: [
                        "Harriet-1.jpg",
                        "Harriet-2.jpg",
                        "Harriet-3.jpg",
                        "Harriet-4.jpg",
                    ],
                    price: 1000,
                },
                {
                    name: "River",
                    category: "koala",
                    dob: "2018-04-12",
                    sex: "male",
                    description:
                        "Hi, my name is River. I was so named as I was found in the Rivers carpark in Nelson Bay.  Some mean birds were swooping me and I was very upset.  A lovely carer rescued me and brought me to the Koala Hospital.  Although I was deemed to be fit and healthy and was returned to the wild I am now suffering from Chlamydia and am back in hospital for some treatment.  My carers at the hospital thought I was “as cute as a button” – don’t you agree?  Please adopt me to help with the costs of looking after my brothers and sisters and towards running the Port Stephens Koala Hospital.",
                    images: ["River-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Casey",
                    category: "koala",
                    dob: "2019-10-28",
                    sex: "female",
                    description:
                        "Hi my name is Casey – aren’t I a cutie? I am a two-year-old girl who was rescued while trying to get in the back door of someone’s house in Salamander. They got a shock and so did I! I was so scared and was fleeing from a threat, but I didn’t want to hang around to find out what it was. I have been given a clean bill of health by our veterinary team and am now safely ensconced in the rehabilitation section of the hospital. I will remain under observation until the hospital team decide what is best for me and it is safe to release me back in Salamander.",
                    images: ["Casey-1.jpg"],
                    price: 1000,
                },
                {
                    name: "Paul",
                    category: "koala",
                    dob: "2021-12-27",
                    sex: "male",
                    description:
                        "Hi my name is Paul.  I am almost five years old and I have been told by my carers at the hospital that I have a “little attitude”! Now I don’t quite know what that means, but I like to let people know how I am feeling. No reason to keep them guessing! I love love love my tallow and terra (types of eucalyptus leaves) and although I am not sure what my future brings, I know that the wonderful staff and carers at the Koala Hospital will continue to take care of me.",
                    images: ["Paul-1.jpg"],
                    price: 1000,
                },
            ],
            temp: [],
            plans: [
                {
                    pName: "認養單隻無尾熊",
                    pPrice: 1000,
                    pPoint: 1000,
                    pGift1: "物美價廉的尤加利葉",
                    pGift2: "熱銷第一的尤加利葉",
                    pDesc: "領養單隻無尾熊，可自行選擇欲幫助之無尾熊，捐贈之款項將會專款專用，用於該隻無尾熊醫療、照護等相關費用。",
                    pBtn: "立即認養",
                },
                {
                    pName: "資助所有無尾熊",
                    pPrice: 300,
                    pPoint: 300,
                    pGift1: "經濟實惠的尤加利葉",
                    pGift2: "物美價廉的尤加利葉",
                    pDesc: "資助園區內所有無尾熊，捐贈之款項將會用於維護園區設備、採購醫療用品、種植尤加利樹及支持無尾熊相關之研究計畫等。",
                    pBtn: "立即資助",
                },
            ],
        };
    },
    created() {
        console.log(this.$route.params.name);
        [this.temp] = [
            ...this.koalaInfo.filter((item) => {
                return item.name === this.$route.params.name;
            }),
        ];
    },
};
</script>

<style lang="scss" scoped>
.breadcrumb {
    max-width: 1000px;
    margin: 15px auto 0;
    text-align: left;
    font-family: font-EL;
    color: #515a6e;
    a {
        color: #515a6e;
        padding-right: 20px;
    }
    a:last-child {
        color: $btn-color;
        font-family: font-R;
    }
    a + a::before {
        content: "›";
        color: #44514b;
        margin-right: 20px;
    }
}
.koala-info {
    max-width: 1000px;
    margin: 15px auto 50px;
    display: flex;
    justify-content: space-around;
    @include m() {
        flex-wrap: wrap;
    }
    .img {
        width: 45%;
        display: flex;
        justify-content: center;
        align-items: center;
        @include m() {
            width: 100%;
            margin-bottom: 30px;
        }
    }
    .text {
        box-sizing: border-box;
        padding: 0 5%;
        flex-grow: 1;
        text-align: left;
        @include m() {
            width: 100%;
        }
        .paragraph {
            margin: 15px 0;
            h1 {
                @include media(900) {
                    font-size: 36px;
                }
            }
            h3 {
                @include media(900) {
                    font-size: 18px;
                }
            }
            p {
                font-size: 18px;
                text-align: justify;
                line-height: 1.5;
            }
        }
    }
}
.plans {
    background-color: $lightgreen;
    .wrapper {
        padding: 30px 0;
        .plan-wrapper {
            max-width: 800px;
            margin: 30px auto 0;
            display: flex;
            justify-content: space-around;
            @include m() {
                flex-wrap: wrap;
                row-gap: 30px;
            }
        }
    }
}
.faqs {
    padding: 30px 0;
    .collapse {
        font: font-R;
        a {
            text-decoration: underline;
        }
        @include m() {
            width: 100%;
        }
    }
}
</style>
